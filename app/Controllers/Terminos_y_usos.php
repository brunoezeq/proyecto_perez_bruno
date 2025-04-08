<?php

namespace App\Controllers;

class Terminos_y_usos extends BaseController
{
    public function index(): string
    {
        return view('front/header')
         . view('front/terminos_y_usos')
         . view('front/footer');            
    }
}