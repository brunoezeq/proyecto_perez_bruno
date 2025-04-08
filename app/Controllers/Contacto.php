<?php

namespace App\Controllers;

class Contacto extends BaseController
{
    public function index()
    {
        $data["titulo"] = "Nosotros";
        return view('front/header')
         . view('front/contacto', $data)
         . view('front/footer'); 
    }
}