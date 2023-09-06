<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Halo Sign In!',
            'validation' => \Config\Services::validation(),
        ];

        return view('/auth/login', $data);
    }
}
