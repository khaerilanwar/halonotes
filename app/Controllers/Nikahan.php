<?php

namespace App\Controllers;

class Nikahan extends BaseController
{

    public function __construct()
    {
        helper('halo');
        cekLogin();
    }

    public function index()
    {
        $data = [
            "title" => "Halo Pernikahan!",
            "heading" => "Data Pernikahan " . $this->user['nama'],
            "user" => $this->user,
        ];

        return view("nikahan", $data);
    }
}
