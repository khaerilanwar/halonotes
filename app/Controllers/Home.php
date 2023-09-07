<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct()
    {
        helper('halo');
        cekLogin();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Halo Dashboard!'
        ];

        return view('home', $data);
    }
}
