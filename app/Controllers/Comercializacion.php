<?php

namespace App\Controllers;

class Comercializacion extends BaseController
{
    public function index(): string
    {
        return view('front/header')
         . view('front/comercializacion')
         . view('front/footer');            
    }
}