<?php

namespace App\Controllers;

use App\Models\usuario_model; 
use App\Models\consulta_model;
use App\Models\venta_model;
use App\Models\detalle_venta_model;

class UsuarioController extends BaseController{

    public function registro(): string
    {
        $data["titulo"] = "Registro";
        return view('front/header', $data)
         . view('front/registro')
         . view('front/footer');
    }

    public function login(): string
    {
        $data["titulo"] = "Login";
        return view('front/header', $data)
         . view('front/login')
         . view('front/footer');
    }

    //FUNCION PARA REGISTRAR UN USUARIO
    public function registrarUsuario(){
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules(
            ['nombre'       => 'required|min_length[3]|max_length[50]',
             'apellido'     => 'required|min_length[3]|max_length[50]',
             'usuario'      => 'required|max_length[100]|is_unique[usuario.usuario]',
             'contraseña'   => 'required|max_length[100]',
             'confirmar_contraseña' => 'required|matches[contraseña]'
        ],
            [ //Errores
                'nombre'        => [ 'required' => 'El nombre es obligatorio',
                                     'min_length' => 'El nombre debe superar los 3 caracteres',
                                     'max_length' => 'El nombre no debe superar los 50 caracteres'],
                'apellido'       => [ 'required' => 'El apellido es obligatorio',
                                      'min_length' => 'El apellido debe superar los 3 caracteres',
                                      'max_length' => 'El apellido no debe superar los 50 caracteres'],
                'usuario'       => [ 'required' => 'El usuario es obligatorio',
                                     'is_unique' => 'El usuario ya esta registrado'],
                'contraseña'    => [ 'required'   => 'La contraseña es obligatoria'],
                'confirmar_contraseña' => [ 'required' => 'Debes confirmar la contraseña',
                                            'matches'  => 'Las contraseñas no coinciden']
            ]
        );

        if($validation->withRequest($request)->run()){
            $data = [
                'nombre_usuario' => $request->getPost('nombre'),
                'apellido_usuario' => $request->getPost('apellido'),
                'usuario' => $request->getPost('usuario'),
                'contraseña_usuario' => password_hash($request->getPost('contraseña'), PASSWORD_BCRYPT),
                'perfil_id' => 2,
                'estado_usuario' => 1
            ];

            $usuario = new usuario_model();
            $usuario->insert($data);

            return redirect()->route('login')->with('mensaje', 'Usuario registrado con éxito');

        }else{

            $data['titulo'] = 'Registro';
            $data['validation'] = $validation->getErrors();
            
            return view('front/header', $data)
                   .view('front/registro')
                   .view('front/footer'); 
        }
    }
   
    //FUNCION PARA REGISTRAR UNA CONSULTA
    public function registrarConsulta()
    {
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules(
            ['nombre'   => 'required|min_length[3]|max_length[50]',
             'mail'     => 'required|valid_email',
             'asunto'   => 'required|max_length[50]',
             'consulta' => 'required|min_length[10]|max_length[100]'
        ],
            [ //Errores
                'nombre'    => [ 'required' => 'El nombre es obligatorio',
                                 'min_length' => 'El nombre debe superar los 3 caracteres',
                                 'max_length' => 'La consulta no debe superar los 50 caracteres'],
                'mail'      => [ 'required' => 'El correo es obligatorio',
                                 'valid_email' => 'La dirección de correo debe ser valida'],
                'asunto'    => [ 'required' => 'El asunto es obligatorio',
                                 'max_length' => 'El asunto no debe superar los 50 caracteres'],
                'consulta'  => [ 'required'   => 'La consulta es obligatoria',
                                 'min_length' => 'La consulta debe superar los 10 caracteres',
                                 'max_length' => 'La consulta no debe superar los 100 caracteres'],
            ]
        );

        if($validation->withRequest($request)->run()){
            $data = [
                'usuario_id' => session()->has('id_usuario') ? session('id_usuario') : null,
                'nombre_consulta' => $request->getPost('nombre'),
                'mail_consulta' => $request->getPost('mail'),
                'asunto_consulta' => $request->getPost('asunto'),
                'consulta' => $request->getPost('consulta'),
                'leido' => 0,
                'respondido' => 0
            ];

            $consulta = new consulta_model();
            $consulta->insert($data);

            return redirect()->route('contacto')->with('mensaje_consulta', 'Su consulta se envió con éxito');

        }else{

            $data['titulo'] = 'Contacto';
            $data['validation'] = $validation->getErrors();
            
            return view('front/header', $data)
                   .view('front/contacto')
                   .view('front/footer'); 
        }
    }

    public function iniciarSesion()
    {
        helper(['form']);
        
        // Validar entrada
       $validation = \Config\Services::validation();
       $request = \Config\Services::request();

       $validation->setRules(
            [   'usuario'    => 'required',
                'contraseña' => 'required'
        ],
            [ //Errores
                'usuario'    => ['required' => 'Debe ingresar el usuario'],
                'contraseña' => ['required' => 'Debe ingresar la contraseña'],
            ]
        );

       if(!$validation->withRequest($request)->run()){

            $data['titulo'] = 'Iniciar Sesión';
            $data['validation'] = $validation->getErrors();
            return view('front/header', $data)
                   .view('front/login')
                   .view('front/footer'); 

        }

        $usuario = $this->request->getPost('usuario');
        $contrasenia = $this->request->getPost('contraseña');

        $usuarioModel = new \App\Models\Usuario_model();
        $usuarioData = $usuarioModel->where('usuario', $usuario)->first();

        if (is_array($usuarioData) && isset($usuarioData['contraseña_usuario'])) {

            if (password_verify($contrasenia, $usuarioData['contraseña_usuario'])) {

                if ($usuarioData['estado_usuario'] == 1) {
 
                    $datosSesion = [
                        'id_usuario' => $usuarioData['id_usuario'],
                        'usuario_usuario' => $usuarioData['usuario'],
                        'rol_usuario' => $usuarioData['perfil_id'],
                        'estado_usuario' => $usuarioData['estado_usuario'],
                        'logueado' => true
                    ];

                    session()->set($datosSesion);

                    
                    if ($usuarioData['perfil_id'] == '1') {
                        return redirect()->to('user_admin');
                    } else {
                        return redirect()->to('/');
                    }
                } else {
                    session()->setFlashdata('mensaje', 'El usuario está inactivo');
                }
                 } else {
                    session()->setFlashdata('mensaje', 'Usuario o contraseña incorrectos');
            }
                } else {
                    session()->setFlashdata('mensaje', 'Usuario o contraseña incorrectos');
        }

         $data['titulo'] = 'Iniciar Sesión';
         return view('front/header', $data)
         . view('front/login')
         . view('front/footer');
    }


    public function cerrarSesion(){
        $session = session();     
        $session->destroy();      
        return redirect()->to('/'); 
    }

    public function admin(){
        $data['titulo'] = 'Index';
        
        return view('front/header_admin')
               .view('backend/panel_admin')
               .view('front/footer_admin');
    }

    public function verConsultas() {
        $consulta = new Consulta_model();

        $desde = $this->request->getGet('desde');
        $hasta = $this->request->getGet('hasta');

        $builder = $consulta
            ->select('consulta.*, usuario.nombre_usuario, usuario.apellido_usuario')
            ->join('usuario', 'usuario.id_usuario = consulta.usuario_id', 'left')
            ->orderBy('consulta.fecha_consulta', 'DESC');

        if ($desde) {
            $builder->where('consulta.fecha_consulta >=', $desde);
        }
        if ($hasta) {
            $builder->where('consulta.fecha_consulta <=', $hasta);
        }

        $data['consultas'] = $builder->findAll();

        return view('front/header_admin', $data)
            . view('backend/verConsultas', $data)
             . view('front/footer_admin');
    }
    
    public function marcarRespondido($id){
        $consulta = new consulta_model();
        $consulta->update($id, ['respondido' => 1]);
        return redirect()->back()->with('mensaje', 'Consulta marcada como respondida.');
    }

    public function editarPerfil(){
        $id = session('id_usuario'); 

        $usuario = new usuario_model(); // 
        $data['usuario'] = $usuario->where('id_usuario', $id)->first();
        $data['titulo'] = 'Editar Perfil';

        if (!$data['usuario']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Usuario no encontrado');
        }

        return view('front/header', $data)
            . view('front/editarPerfil', $data)
            . view('front/footer');
    }

    public function actualizarPerfil(){

        $id = session('id_usuario');

        $usuarioModel = new usuario_model();
        $usuarioActual = $usuarioModel->find($id);

        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        
        $usuarioIngresado = $request->getPost('usuario');
        $isUniqueRule = ($usuarioIngresado === $usuarioActual['usuario']) 
            ? 'required|max_length[100]'
            : 'required|max_length[100]|is_unique[usuario.usuario]';

        $validation->setRules(
            [
                'nombre' => 'required|min_length[3]|max_length[50]',
                'apellido' => 'required|min_length[3]|max_length[50]',
                'usuario' => $isUniqueRule,
                'contraseña' => 'permit_empty|max_length[100]',
                'confirmar_contraseña' => 'matches[contraseña]'
            ],
            [
                'usuario' => ['is_unique' => 'El usuario ya está registrado'],
                'confirmar_contraseña' => ['matches' => 'Las contraseñas no coinciden']
            ]
        );

        if ($validation->withRequest($request)->run()) {
            $data = [
                'nombre_usuario' => $request->getPost('nombre'),
                'apellido_usuario' => $request->getPost('apellido'),
                'usuario' => $usuarioIngresado,
            ];

            $nuevaPass = $request->getPost('contraseña');
            if (!empty($nuevaPass)) {
                $data['contraseña_usuario'] = password_hash($nuevaPass, PASSWORD_DEFAULT);
            }

            $usuarioModel->update($id, $data);

            $usuarioActualizado = $usuarioModel->find($id);
            $session = session();
            $session->set([
            'usuario_usuario'   => $usuarioActualizado['usuario'],
            'nombre_usuario'    => $usuarioActualizado['nombre_usuario'],
            'apellido_usuario'  => $usuarioActualizado['apellido_usuario'],
            ]);

            return redirect()->to(base_url('principal'))->with('mensaje', 'Perfil actualizado correctamente.');
        } else {
            return redirect()->back()
                ->withInput()
                ->with('errors', $validation->getErrors());
        }
    }

    public function verMisCompras(){
        $ventaModel   = new venta_model();
        $detalleModel = new detalle_venta_model();

        $usuarioId = session('id_usuario');

        
        $fechaInicio = $this->request->getGet('fecha_inicio');
        $fechaFin    = $this->request->getGet('fecha_fin');

        
        $ventaModel->where('cliente_id', $usuarioId);

        
        if (!empty($fechaInicio) && !empty($fechaFin)) {
            $ventaModel->where('fecha_venta >=', $fechaInicio)
                    ->where('fecha_venta <=', $fechaFin);
        }

        $ventas = $ventaModel
            ->orderBy('fecha_venta', 'DESC')
            ->findAll();

        
        foreach ($ventas as &$venta) {
            $venta['detalles'] = $detalleModel
                ->select('detalle_venta.*, producto.nombre_producto')
                ->join('producto', 'producto.id_producto = detalle_venta.producto_id')
                ->where('venta_id', $venta['id_venta'])
                ->findAll();
        } 
        unset($venta);

        $data = [
            'titulo'       => 'Mis Compras',
            'ventas'       => $ventas,
            'fecha_inicio' => $fechaInicio,
            'fecha_fin'    => $fechaFin
        ];

        return view('front/header', $data)
            . view('front/verMisCompras', $data)
            . view('front/footer');
    }

}