<?php

namespace App\Controllers;

use App\Models\usuario_model; 
use App\Models\consulta_model;

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
                'usuario_estado' => 1
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
                'nombre_consulta' => $request->getPost('nombre'),
                'mail_consulta' => $request->getPost('mail'),
                'asunto_consulta' => $request->getPost('asunto'),
                'consulta' => $request->getPost('consulta')
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

    public function iniciarSesion(){
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();
        $session = session();

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

            $data['titulo'] = 'Registro';
            $data['validation'] = $validation->getErrors();
            return view('front/header', $data)
                   .view('front/registro')
                   .view('front/footer'); 

        }

        $user = $request->getPost('usuario');
        $contraseña = $request->getPost('contraseña');

        $usuario_model = new usuario_model();
        $usuario = $usuario_model->where('usuario_usuario', $user)->where('usuario_estado', 1)->first();

        if($user && password_verify($contraseña, $user['usuario_contraseña'])){

            $data = [
                'id' => $user['id_usuario'],
                'nombre' => $user['nombre_usuario'],
                'apellido' => $user['apellido_usuario'],
                'perfil' => $user['perfil_id'],
                'login' => true
            ];

            $session->set($data);

            switch ($user['perfil_id']){
                case '1': 
                    return redirect()->route('user_admin');
                    break;
                case '2': 
                    return redirect()->route('/');
                    break;
            }
        }else{
            return redirect()->route('login')->with('mensaje', 'Usuario y/o contraseña incorrecto');
        }
    }

    public function cerrarSesion(){
        $session = session();
        $session = destroy();
        return redirect()->route('front/principal');
    }

    public function admin(){
        $data['titulo'] = 'Index';
        
        return view('front/header_admin');
    }

}