<?php

namespace App\Controllers;

use App\Models\HutangModel;
use CodeIgniter\I18n\Time;

class Piutang extends BaseController
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
            "title" => "Halo Piutang!",
            "heading" => "Data Piutang " . $this->user['nama'],
            "user" => $this->user,
            "piutang" => $this->hutangData->where(['id_user' => $this->user['id'], 'status' => 'Belum Lunas', 'jenis' => 'Piutang'])->orderBy('tanggal', 'DESC')->get()->getResultArray()
        ];

        return view("piutang", $data);
    }

    public function tambahDataPiutang()
    {

        $data = [
            'id' => rand(10000000, 99999999),
            'nama' => $this->request->getPost('debitur'),
            'nominal' => preg_replace("/[^0-9]/", "", $this->request->getPost('nominal')),
            'jenis' => 'Piutang',
            'status' => 'Belum Lunas',
            'tanggal' => $this->request->getPost('tanggal'),
            'id_user' => $this->user['id'],
            'created_at' => Time::now('Asia/Jakarta')
        ];

        $this->hutangData->insert($data);
        session()->setFlashdata('tambahPiutang', 'Piutang telah ditambahkan!');
        return redirect()->to('/piutang');
    }

    public function riwayatPiutang()
    {
        $data = [
            "title" => "Halo Piutang!",
            "heading" => "Data Piutang " . $this->user['nama'],
            "user" => $this->user,
            "piutangLunas" => $this->hutangData->where(['id_user' => $this->user['id'], 'status' => 'Lunas', 'jenis' => 'Piutang'])->orderBy('tanggal', 'DESC')->get()->getResultArray()
        ];

        return view("riwayatPiutang", $data);
    }

    public function lunaskan($id)
    {
        $this->hutangModel->update($id, ['status' => 'Lunas']);
        session()->setFlashdata('lunas', 'Hutang Piutang telah lunas!');
        return redirect()->to('/piutang');
    }
}
