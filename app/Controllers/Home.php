<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data["titulo"] = "Neighbourhood Café";
        return view('front/header', $data)         /*   */
         . view('front/principal')
         . view('front/footer');            
    }

    public function somos(): string                 /* <------ BLOQUES AGREGADOS POR EL PROFE, DICE QUE NO ES NECESARIO TENER TANTOS CONTROLADORES POR SEPARADO SINO TODOS EN EL HOME */
    {
        $data["titulo"] = "Nosotros";          
        return view('front/header', $data)
         . view('front/quienes_somos')
         . view('front/footer');            
    }

    public function terminos(): string
    {
        $data["titulo"] = "Terminos y Usos";
        return view('front/header', $data)
         . view('front/terminos_y_usos')
         . view('front/footer');            
    }

    public function comercializacion(): string
    {
        $data["titulo"] = "Comercializacion";
        return view('front/header', $data)
         . view('front/comercializacion')
         . view('front/footer');            
    }

    public function contacto(): string
    {
        $data["titulo"] = "Contacto";
        return view('front/header', $data)
         . view('front/contacto')
         . view('front/footer'); 
    }

    
/*     
    public function catalogo(): string
        {
            $data["titulo"] = "Catálogo";
            return view('front/header', $data)
            . view('front/catalogo')
            . view('front/footer');
        }

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
    } */

}

