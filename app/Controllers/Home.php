<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $dataHutang;
    public function __construct()
    {
        $this->dataHutang = \Config\Database::connect()->table('hutang');
        helper('halo');
        cekLogin();
    }

    public function index(): string
    {
        $totalHutang = $this->dataHutang->selectSum('nominal')->getWhere(['id_user' => $this->user['id'], 'jenis' => 'Hutang', 'status' => 'Belum Lunas'])->getRowArray();
        $totalPiutang = $this->dataHutang->selectSum('nominal')->getWhere(['id_user' => $this->user['id'], 'jenis' => 'Piutang', 'status' => 'Belum Lunas'])->getRowArray();
        $data = [
            'title' => 'Halo Dashboard!',
            'heading' => 'Selamat Datang ' . $this->user['nama'] . ' 👋',
            'user' => $this->user,
            'totalHutang' => $totalHutang['nominal'],
            'totalPiutang' => $totalPiutang['nominal']
        ];

        return view('home', $data);
    }
}
