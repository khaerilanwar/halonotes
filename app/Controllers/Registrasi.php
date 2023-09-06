<?php

namespace App\Controllers;

class Registrasi extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Halo Registrasi!',
            'validation' => \Config\Services::validation(),
        ];

        return view('/auth/registrasi', $data);
    }

    public function register()
    { }
}
