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
            'title' => 'Halo Dashboard!',
            'heading' => 'Selamat Datang ' . $this->user['nama'] . ' 👋',
            'user' => $this->user
        ];

        return view('home', $data);
    }
}
