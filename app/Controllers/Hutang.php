<?php

namespace App\Controllers;

class Hutang extends BaseController
{
    protected $hutangData;

    public function __construct()
    {
        $this->hutangData = \Config\Database::connect()->table('hutang');
        helper('halo');
        cekLogin();
    }

    public function index()
    {
        $data = [
            "title" => "Halo Hutang!",
            "heading" => "Data Hutang " . $this->user['nama'],
            "user" => $this->user,
            "hutang" => $this->hutangData->where('id_user', $this->user['id'])->orderBy('tanggal', 'DESC')->get()->getResultArray()
        ];

        return view("hutang", $data);
    }
}
