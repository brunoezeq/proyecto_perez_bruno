<?php

namespace App\Controllers;

class Quienes_somos extends BaseController
{
    public function index(): string
    {
        return view('front/header')
         . view('front/quienes_somos')
         . view('front/footer');            
    }
}