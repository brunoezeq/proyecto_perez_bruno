<?php

namespace App\Controllers;

class Contacto extends BaseController
{
    public function index()
    {
        return view('front/header')
         . view('front/contacto')
         . view('front/footer'); 
    }
}