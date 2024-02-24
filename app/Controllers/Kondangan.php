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
        // $faker = \Faker\Factory::create('id_ID');
        // dd($faker->dateTimeBetween('-4 weeks')->format('Y-m-d'));
        $data = [
            "title" => "Halo Kondangan!",
            "heading" => "Data Kondangan " . $this->user['nama'],
            "user" => $this->user,
            "kondangan" => $this->kondanganData->where(['id_user' => $this->user['id'], 'status' => 'Belum Datang'])->orderBy('tanggal', 'DESC')->get()->getResultArray()
        ];

        return view("kondangan", $data);
    }

    public function tambahDataKondangan()
    {

        $data = [
            'id' => rand(100000000, 999999999),
            'nama' => $this->request->getPost('nama'),
            'nominal' => preg_replace("/[^0-9]/", "", $this->request->getPost('nominal')),
            'alamat' => $this->request->getPost('alamat'),
            'status' => 'Belum Datang',
            'tanggal' => $this->request->getPost('tanggal'),
            'id_user' => $this->user['id'],
            'created_at' => Time::now('Asia/Jakarta')
        ];

        $this->kondanganData->insert($data);
        session()->setFlashdata('tambahKondangan', 'Kondangan telah ditambahkan!');
        return redirect()->to('/kondangan');
    }

    public function riwayatKondangan()
    {
        $data = [
            "title" => "Halo Kondangan!",
            "heading" => "Data Kondangan " . $this->user['nama'],
            "user" => $this->user,
            "kondanganSelesai" => $this->kondanganData->where(['id_user' => $this->user['id'], 'status' => 'Sudah Datang'])->orderBy('tanggal', 'DESC')->get()->getResultArray()
        ];

        return view("riwayatKondangan", $data);
    }

    public function lunaskan()
    {
        $this->kondanganModel->update($this->request->getPost('idKondangan'), ['status' => 'Sudah Datang', 'nominal_kondangan' => preg_replace("/[^0-9]/", "", $this->request->getPost('nominalKondangan'))]);
        session()->setFlashdata('selesai', 'Kondangan sudah selesai!');
        return redirect()->to('/kondangan');
    }
}
