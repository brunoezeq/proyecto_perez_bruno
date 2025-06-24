<?php

namespace App\Controllers;
use App\Models\producto_model; 
use App\Models\categoria_model;
use App\Models\venta_model;
use App\Models\detalle_venta_model;
use App\Models\medio_pago_model;

class CarritoController extends BaseController{

    public function verCarrito(){
        $cart = \Config\Services::cart();
        $medio_pago = new medio_pago_model();
        $data['medio_pago'] = $medio_pago->findAll();
        $data['titulo'] = 'Mi Carrito';
        $data['carrito'] = $cart->contents(); 

        return view('front/header', $data)
            . view('front/carrito', $data)
            . view('front/footer');
    }


    public function agregarAlCarrito(){
        
        $cart = \Config\Services::cart();
        $request = \Config\Services::request();

        $idProducto = $request->getPost('id');
        $nombre = $request->getPost('nombre');
        $precio = $request->getPost('precio');

        $productoModel = new \App\Models\Producto_model();
        $producto = $productoModel->find($idProducto);

        if (!$producto || $producto['estado_producto'] != 1) {
            return redirect()->back()->with('mensaje', 'Producto no válido o inactivo.');
        }

        // Verificar cuántas unidades ya hay en el carrito de este producto
        $items = $cart->contents();
        $cantidadEnCarrito = 0;

        foreach ($items as $item) {
            if ($item['id'] == $idProducto) {
                $cantidadEnCarrito += $item['qty'];
            }
        }

        // Verificar stock disponible
        if ($producto['stock_producto'] <= $cantidadEnCarrito) {
            return redirect()->back()->with('mensaje', 'No hay suficiente stock disponible.');
        }

        // Agregar al carrito si hay stock disponible
        $data = [
            'id'    => $idProducto,
            'name'  => $nombre,
            'price' => $precio,
            'qty'   => 1
        ];

        $cart->insert($data);

        return redirect()->route('verCarrito')->with('mensaje', '¡Producto agregado al carrito!');
    }

 
    public function eliminarItem($rowid){
        $cart = \Config\Services::cart();
        $cart->remove($rowid);

        return redirect()->route('verCarrito')->with('mensaje', 'Producto eliminado del carrito.');
    }

    public function vaciarCarrito(){
        $cart = \Config\Services::cart();
        $cart->destroy(); 
        
        return redirect()->route('verCarrito')->with('mensaje', 'Carrito vaciado correctamente.');
    }

}