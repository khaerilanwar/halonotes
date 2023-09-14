<?php

namespace App\Controllers;

use App\Models\KondanganModel;
use CodeIgniter\I18n\Time;

class Kondangan extends BaseController
{
    protected $kondanganData;
    protected $kondanganModel;

    public function __construct()
    {
        $this->kondanganModel = new KondanganModel();
        $this->kondanganData = \Config\Database::connect()->table('kondangan');
        helper('halo');
        cekLogin();
    }

    public function index()
    {
        $data = [
            "title" => "Halo Kondangan!",
            "heading" => "Data Kondangan " . $this->user['nama'],
            "user" => $this->user,
            "kondangan" => $this->kondanganData->where(['id_user' => $this->user['id'], 'status' => 'Belum Datang'])->orderBy('tanggal', 'DESC')->get()->getResultArray()
        ];

        return view("kondangan", $data);
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

        $this->kondanganData->insert($data);
        session()->setFlashdata('tambahHutang', 'Hutang telah ditambahkan!');
        return redirect()->to('/hutang');
    }

    public function riwayatHutang()
    {
        $data = [
            "title" => "Halo Hutang!",
            "heading" => "Data Hutang " . $this->user['nama'],
            "user" => $this->user,
            "hutangLunas" => $this->kondanganData->where(['id_user' => $this->user['id'], 'status' => 'Lunas', 'jenis' => 'Hutang'])->orderBy('tanggal', 'DESC')->get()->getResultArray()
        ];

        return view("riwayatHutang", $data);
    }

    public function lunaskan($id)
    {
        $this->kondanganModel->update($id, ['status' => 'Lunas']);
        session()->setFlashdata('lunas', 'Hutang Piutang telah lunas!');
        return redirect()->to('/hutang');
    }
}
