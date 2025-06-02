<?php

namespace App\Controllers;
use App\Models\producto_model; 
use App\Models\categoria_model;

class ProductoController extends BaseController{

    public function formularioCargarProducto(){
        $categoria = new categoria_model(); 
        $data['categoria'] = $categoria->findAll();
        $data['titulo'] = 'Agregar Producto';
        
        return view('front/header_admin', $data)
               .view('backend/cargarProducto', $data); 
    }
    
    public function cargarProducto(){
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();
        
        $validation->setRules(
            ['nombre'   => 'required|min_length[3]|max_length[50]',
             'descripcion' => 'required|min_length[10]|max_length[100]',
             'categoria'   =>  'required|is_not_unique[categoria.id_categoria]',
             'precio' => 'required|min_length[3]|max_length[10]',
             'stock' => 'required|min_length[1]|max_length[10]'

        ],
            [ //Errores
                'nombre'       => [ 'required'   => 'El nombre es obligatorio',
                                    'min_length' => 'El nombre debe superar los 5 caracteres',
                                    'max_length' => 'La consulta no debe superar los 50 caracteres'],
                'descripcion'  => [ 'required'   => 'La descripción es obligatoria',
                                    'min_length' => 'El nombre debe superar los 5 caracteres',
                                    'max_length' => 'La consulta no debe superar los 50 caracteres'],
                'categoria'    => [ 'required'   => 'La categoría es obligatoria'],
                'precio'       => [ 'required'   => 'El precio es obligatorio',
                                    'min_length' => 'El precio debe superar los 10 caracteres',
                                    'max_length' => 'El precio no debe superar los 100 caracteres'],
                'stock'        => [ 'required'   => 'El stock es obligatorio',
                                    'min_length' => 'El stock debe superar los 1 caracteres',
                                    'max_length' => 'El stock no debe superar los 100 caracteres'],
            ]
        );

        if($validation->withRequest($request)->run()){
            $data = [
                'nombre_producto' => $request->getPost('nombre'),
                'descripcion_producto' => $request->getPost('descripcion'),
                'categoria_producto' => $request->getPost('categoria'),
                'precio_producto' => $request->getPost('precio'),
                'stock_producto' => $request->getPost('stock'),
                'estado_producto' => 1
            ];

            $producto = new producto_model();
            $producto->insert($data);
            return redirect()->to('/cargarProducto')->with('mensaje', '¡Producto cargado con éxito!');
 

        }else{
            $categoria = new categoria_model();
            $data['validation'] = $validation->getErrors();
            $data['categoria'] = $categoria->findAll();
            $data['titulo'] = 'Agregar Producto';

            return view('front/header', $data)
                   .view('backend/cargarProducto'); 
        }

    }

    public function gestionarProducto(){
        $producto_model = new producto_model();
        $categoria = new categoria_model();
        $data['Producto'] = $producto_model->join('producto_categoria', 'producto_categoria.categoria_id = producto.producto_categoria')->findAll();
        $data['titulo'] = 'listar productos';

        return view('backend/header_admin', $data)
               .view('front/listarProducto');
    }

    public function editarLibro(){
        $producto_model = new producto_model();
        $categoria = new categoria_model();

        $data['categoria'] = $categoria->findAll();
        $data['producto'] = $producto_model->where('producto_id', $id)->first();
        $data['titulo'] = 'Edición producto'; 

        return view('backend/header_admin')
              .view('front/editarProductos');
    }

    public function actualizarProducto(){
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules(
            ['nombre'   => 'required|min_length[3]|max_length[50]',
             'descripcion' => 'required|min_length[10]|max_length[100]',
             'categoria'   =>  'required|is_not_unique[categoria.id_categoria]',
             'precio' => 'required|min_length[3]|max_length[10]',
             'stock' => 'required|min_length[1]|max_length[10]'

        ],
            [ //Errores
                'nombre'       => [ 'required'   => 'El nombre es obligatorio',
                                    'min_length' => 'El nombre debe superar los 5 caracteres',
                                    'max_length' => 'La consulta no debe superar los 50 caracteres'],
                'descripcion'  => [ 'required'   => 'La descripción es obligatoria',
                                    'min_length' => 'El nombre debe superar los 5 caracteres',
                                    'max_length' => 'La consulta no debe superar los 50 caracteres'],
                'categoria'    => [ 'required'   => 'La categoría es obligatoria'],
                'precio'       => [ 'required'   => 'El precio es obligatorio',
                                    'min_length' => 'El precio debe superar los 10 caracteres',
                                    'max_length' => 'El precio no debe superar los 100 caracteres'],
                'stock'        => [ 'required'   => 'El stock es obligatorio',
                                    'min_length' => 'El stock debe superar los 1 caracteres',
                                    'max_length' => 'El stock no debe superar los 100 caracteres'],
            ]
        );

        
        if($validation->withRequest($request)->run()){
           
            $data = [
                'nombre_producto' => $request->getPost('nombre'),
                'descripcion_producto' => $request->getPost('descripcion'),
                'categoria_producto' => $request->getPost('categoria'),
                'precio_producto' => $request->getPost('precio'),
                'stock_producto' => $request->getPost('stock')
            ];

            $producto = new producto_model();
            $producto->update($id, $data);
            return redirect()->get('gestionarProducto')->with('mensaje', '¡Producto actualizado con éxito!'); 

        }else{ // ------ REVISAR ------
            $categoria = new categoria_model();
            $data['validation'] = $validation->getErrors();
            $data['categoria'] = $categoria->findAll();
            $data['titulo'] = 'Agregar Producto';

            return view('front/header', $data)
                   .view('backend/actualizarProducto');
        }
    }

    public function eliminarProducto(){
        $data = array('producto_estado' => '0');
        $producto = new producto_model();
        $producto->update($id, $data);
        return redirect()->route('gestionarProdcuto'); 
    }

    public function activarProducto(){
        $data = array('producto_estado' => '1');
        $producto = new producto_model();
        $producto->update($id, $data);
        return redirect()->route('gestionarProdcuto'); 
    }
}