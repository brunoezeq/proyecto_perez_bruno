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

        $validation = \Config\Services::validation();
        $cartItems = $cart->contents();

        // Validación de stock
        foreach ($cartItems as $item) {
            $prod = $producto->find($item['id']);
            if (!$prod || $prod['stock_producto'] < $item['qty']) {
                return redirect()->route('verCarrito')->with('mensaje', 'Producto sin stock suficiente.');
            }
        }

        // Reglas de validación
        $validation->setRules([
            'documento'   => 'required|min_length[3]|max_length[50]',
            'celular'     => 'required|min_length[3]|max_length[50]',
            'domicilio'   => 'required|max_length[100]',
            'medio_pago'  => 'required|is_natural_no_zero'
        ], [
            'documento'   => ['required' => 'Debe ingresar su documento'],
            'celular'     => ['required' => 'Debe ingresar un celular'],
            'domicilio'   => ['required' => 'Debe ingresar un domicilio', 'max_length' => 'Máximo 100 caracteres'],
            'medio_pago'  => ['required' => 'Debe seleccionar un medio de pago']
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('mensaje', 'Debe completar los campos.');
        }

        // Insertar venta
        $dataVenta = [
            'cliente_id'  => session('id_usuario'),
            'fecha_venta' => date('Y-m-d'),
            'dni_cliente'   => $this->request->getPost('documento'),
            'domicilio_cliente'  => $this->request->getPost('domicilio'),
            'celular_cliente'   => $this->request->getPost('celular'),
            'medio_pago_id'  => $this->request->getPost('medio_pago')
        ];

        $venta_id = $venta->insert($dataVenta, true);

        if (!$venta_id) {
            return redirect()->route('verCarrito')->with('mensaje', 'Error al registrar la venta.');
        }

        // Insertar detalles y actualizar stock
        foreach ($cartItems as $item) {
            $productoActual = $producto->find($item['id']);
            $nuevo_stock = $productoActual['stock_producto'] - $item['qty'];

            $detalle->insert([
                'venta_id'         => $venta_id,
                'producto_id'      => $item['id'],
                'detalle_cantidad' => $item['qty'],
                'detalle_precio'   => $item['price']
            ]);

            $producto->update($item['id'], ['stock_producto' => $nuevo_stock]);
        }

        $cart->destroy();
        return redirect()->route('catalogo')->with('mensaje', 'Compra registrada con éxito.');
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

        $data['titulo'] = 'Detalle de la Venta';

        return view('front/header_admin', $data)
               .view('backend/verDetalle', [
                'venta' => $data['venta'],
                'detalle' => $data['detalle']
                ])
               .view('front/footer_admin');
    } 

}