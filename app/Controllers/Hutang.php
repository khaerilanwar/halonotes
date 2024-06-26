<?php

namespace App\Controllers;

use App\Models\HutangModel;
use CodeIgniter\I18n\Time;

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
            "hutang" => $this->hutangData->where(['id_user' => $this->user['id'], 'status' => 'Belum Lunas', 'jenis' => 'Hutang'])->orderBy('tanggal', 'DESC')->get()->getResultArray()
        ];

        return view("hutang", $data);
    }

    public function tambahDataHutang()
    {

        $data = [
            'id' => rand(10000000, 99999999),
            'nama' => $this->request->getPost('kreditur'),
            'nominal' => preg_replace("/[^0-9]/", "", $this->request->getPost('nominal')),
            'jenis' => 'Hutang',
            'status' => 'Belum Lunas',
            'tanggal' => $this->request->getPost('tanggal'),
            'id_user' => $this->user['id'],
            'created_at' => Time::now('Asia/Jakarta')
        ];

        $this->hutangData->insert($data);
        session()->setFlashdata('tambahHutang', 'Hutang telah ditambahkan!');
        return redirect()->to('/hutang');
    }

    public function riwayatHutang()
    {
        $data = [
            "title" => "Halo Hutang!",
            "heading" => "Data Hutang " . $this->user['nama'],
            "user" => $this->user,
            "hutangLunas" => $this->hutangData->where(['id_user' => $this->user['id'], 'status' => 'Lunas', 'jenis' => 'Hutang'])->orderBy('tanggal', 'DESC')->get()->getResultArray()
        ];

        return view("riwayatHutang", $data);
    }

    public function lunaskan($id)
    {
        $this->hutangModel->update($id, ['status' => 'Lunas']);
        session()->setFlashdata('lunas', 'Hutang Piutang telah lunas!');
        return redirect()->to('/hutang');
    }
}
