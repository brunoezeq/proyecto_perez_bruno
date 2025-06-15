<?php

namespace App\Controllers;
use App\Models\producto_model; 
use App\Models\categoria_model;
use App\Models\venta_model;
use App\Models\detalle_venta_model;

class VentaController extends BaseController{

    public function registrarVenta() {
    $cart = \Config\Services::cart();
    $venta = new venta_model();
    $detalle = new detalle_venta_model();
    $producto = new producto_model();

    $cart1 = $cart->contents();

    // Validación de stock
    foreach ($cart1 as $item) {
        $producto1 = $producto->where('id_producto', $item['id'])->first();
        if ($producto1['stock_producto'] < $item['qty']) {
            return redirect()->route('verCarrito')->with('mensaje', 'Producto sin stock!');
        }
    }

    // Insertar venta
    $data = [
        'cliente_id' => session('id_usuario'), // debe ser válido o null si visitante
        'fecha_venta' => date('Y-m-d'),
    ];

    $venta_id = $venta->insert($data, true); // ← asegura obtener el ID
    

    if (!$venta_id) {
        return redirect()->route('verCarrito')->with('mensaje', 'Error al registrar la venta.');
    }

    // Insertar detalles de venta y actualizar stock
    foreach ($cart1 as $item) {
        $detalle_venta = [
            'venta_id' => $venta_id,
            'producto_id' => $item['id'],
            'detalle_cantidad' => $item['qty'],
            'detalle_precio' => $item['price']
        ];

        // Actualizar stock
        $producto1 = $producto->where('id_producto', $item['id'])->first();
        $nuevo_stock = $producto1['stock_producto'] - $item['qty'];
        $producto->update($item['id'], ['stock_producto' => $nuevo_stock]);

        // Insertar detalle
        $detalle->insert($detalle_venta);
    }

    $cart->destroy();
    return redirect()->route('catalogo')->with('mensaje', 'Compra registrada con éxito!');
    }



    public function verVentas() {
        $venta = new venta_model();

        $desde = $this->request->getGet('desde');
        $hasta = $this->request->getGet('hasta');

        $venta->select('venta.*, usuario.nombre_usuario, usuario.apellido_usuario')
            ->join('usuario', 'usuario.id_usuario = venta.cliente_id')
            ->orderBy('fecha_venta', 'DESC');

        if ($desde) {
            $venta->where('fecha_venta >=', $desde);
        }

        if ($hasta) {
            $venta->where('fecha_venta <=', $hasta);
        }

        $data['venta'] = $venta->findAll();
        $data['titulo'] = 'Ventas';

        return view('front/header_admin', $data)
            . view('backend/verVentas', $data)
            . view('front/footer_admin');
    }

    public function verDetalle($id_venta) {

        $venta = new venta_model();
        $detalle = new detalle_venta_model();

        $data['venta'] = $venta->select('venta.*, usuario.nombre_usuario, usuario.apellido_usuario')
            ->join('usuario', 'usuario.id_usuario = venta.cliente_id')
            ->where('id_venta', $id_venta)
            ->first();

        $data['detalle'] = $detalle->select('detalle_venta.*, producto.nombre_producto')
            ->join('producto', 'producto.id_producto = detalle_venta.producto_id')
            ->where('venta_id', $id_venta)
            ->findAll();

        $data['titulo'] = 'Detale de la Venta';

        return view('front/header_admin', $data)
               .view('backend/verDetalle', [
                'venta' => $data['venta'],
                'detalle' => $data['detalle']
                ])
               .view('front/footer_admin');
    }

}