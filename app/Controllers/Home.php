<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data["titulo"] = "XPRESSO";
        return view('front/header')
         . view('front/principal', $data)
         . view('front/footer');            
    }
}
