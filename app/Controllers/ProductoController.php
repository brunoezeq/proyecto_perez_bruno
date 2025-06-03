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
        $producto = new producto_model();
        $categoria = new categoria_model();
        $data['categoria'] = $categoria->findAll();
        $data['producto'] = $producto->select('producto.*, categoria.descripcion_categoria')
        ->join('categoria', 'categoria.id_categoria = producto.categoria_producto')
        ->findAll();
        $data['titulo'] = 'listar productos';

        return view('front/header_admin', $data)
               .view('backend/gestionarProducto', $data);
    }

    public function editarProducto($id = null){

        if ($id === null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('ID de producto no proporcionado');
        }

        $producto = new producto_model();
        $categoria = new categoria_model();

        $data['categoria'] = $categoria->findAll();
        $data['producto'] = $producto->where('id_producto', $id)->first();
        $data['titulo'] = 'Edición producto'; 

        if (!$data['producto']) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Producto no encontrado');
        }

        return view('front/header_admin', $data)
              .view('backend/editarProducto', $data);
    }

    public function actualizarProducto(){

        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules(
            [
                'nombre'      => 'required|min_length[3]|max_length[50]',
                'descripcion' => 'required|min_length[10]|max_length[100]',
                'categoria'   => 'required|is_not_unique[categoria.id_categoria]',
                'precio'      => 'required|min_length[1]|max_length[10]',
                'stock'       => 'required|min_length[1]|max_length[10]'
            ],
            [
                'nombre' => [
                    'required'   => 'El nombre es obligatorio',
                    'min_length' => 'El nombre debe superar los 3 caracteres',
                    'max_length' => 'El nombre no debe superar los 50 caracteres'
                ],
                'descripcion' => [
                    'required'   => 'La descripción es obligatoria',
                    'min_length' => 'La descripción debe superar los 10 caracteres',
                    'max_length' => 'La descripción no debe superar los 100 caracteres'
                ],
                'categoria' => [
                    'required'     => 'La categoría es obligatoria',
                    'is_not_unique'=> 'La categoría seleccionada no es válida'
                ],
                'precio' => [
                    'required'   => 'El precio es obligatorio',
                    'min_length' => 'El precio debe tener al menos 1 dígito',
                    'max_length' => 'El precio no debe superar los 10 dígitos'
                ],
                'stock' => [
                    'required'   => 'El stock es obligatorio',
                    'min_length' => 'El stock debe tener al menos 1 dígito',
                    'max_length' => 'El stock no debe superar los 10 dígitos'
                ]
            ]
        );

        if ($validation->withRequest($request)->run()) {
            $id = $request->getPost('id');

            $data = [
                'nombre_producto'      => $request->getPost('nombre'),
                'descripcion_producto' => $request->getPost('descripcion'),
                'categoria_producto'   => $request->getPost('categoria'),
                'precio_producto'      => $request->getPost('precio'),
                'stock_producto'       => $request->getPost('stock')
            ];

            $producto = new producto_model();
            $producto->update($id, $data);

            return redirect()->to(base_url('gestionarProducto'))->with('mensaje', '¡Producto actualizado con éxito!');
        } else {
            return redirect()->back()
                            ->withInput()
                            ->with('errors', $validation->getErrors());
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