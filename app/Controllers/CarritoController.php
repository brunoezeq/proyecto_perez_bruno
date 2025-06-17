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
        
        $data = [
            'id'    => $request->getPost('id'),
            'name'  => $request->getPost('nombre'), 
            'price' => $request->getPost('precio'),
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