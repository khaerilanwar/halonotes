<?php

namespace App\Controllers;

use App\Models\HutangModel;

class Hutang extends BaseController
{
    protected $hutangData;
    protected $hutangModel;

    public function __construct()
    {
        $this->hutangModel = new HutangModel();
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
            "hutang" => $this->hutangData->where(['id_user' => $this->user['id'], 'status' => 'Belum Lunas'])->orderBy('tanggal', 'DESC')->get()->getResultArray()
        ];

        return view("hutang", $data);
    }

    public function cobaan()
    {
        $data = [
            "title" => "Halo Hutang!",
            "heading" => "Data Hutang " . $this->user['nama'],
            "user" => $this->user
        ];

        return view("coba", $data);
    }

    public function riwayatHutang()
    {
        $data = [
            "title" => "Halo Hutang!",
            "heading" => "Data Hutang " . $this->user['nama'],
            "user" => $this->user,
            "hutangLunas" => $this->hutangData->where(['id_user' => $this->user['id'], 'status' => 'Lunas'])->orderBy('tanggal', 'DESC')->get()->getResultArray()
        ];

        return view("riwayatHutang", $data);
    }

    public function lunaskan($id)
    {
        $this->hutangModel->update($id, ['status' => 'Lunas']);
        session()->setFlashdata('lunas', 'Hutang telah lunas!');
        return redirect()->to('/hutang');
    }
}
