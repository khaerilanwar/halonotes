<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $dataHutang;
    protected $dataKondangan;
    public function __construct()
    {
        $this->dataHutang = \Config\Database::connect()->table('hutang');
        $this->dataKondangan = \Config\Database::connect()->table('kondangan');
        helper('halo');
        cekLogin();
    }

    public function index(): string
    {
        $totalHutang = $this->dataHutang->selectSum('nominal')->getWhere(['id_user' => $this->user['id'], 'jenis' => 'Hutang', 'status' => 'Belum Lunas'])->getRowArray();
        $totalPiutang = $this->dataHutang->selectSum('nominal')->getWhere(['id_user' => $this->user['id'], 'jenis' => 'Piutang', 'status' => 'Belum Lunas'])->getRowArray();
        $totalPeminjam = $this->dataHutang->select('nama')->distinct()->getWhere(['jenis' => 'Piutang', 'status' => 'Belum Lunas', 'id_user' => $this->user['id']])->getNumRows();
        $totalKondangan = $this->dataKondangan->select('nama')->getWhere(['id_user' => $this->user['id']])->getNumRows();

        $dataPertahun = [];
        for ($i = 1; $i <= 12; $i++) {
            $bulan = sprintf("%02d", $i);
            $minDate = date("Y") . '-' . $bulan . '-' . '01';
            $maxDate = date("Y") . '-' . $bulan . '-' . '31';
            // array_push($cobaArr, $minDate, $maxDate);
            $query = $this->dataHutang->getWhere(['tanggal >=' => $minDate, 'tanggal <=' => $maxDate, 'jenis' => 'Piutang', 'id_user' => $this->user['id']])->getResultArray();

            $nominalPerbulan = [];
            foreach ($query as $data) {
                array_push($nominalPerbulan, $data['nominal']);
            }

            array_push($dataPertahun, array_sum($nominalPerbulan));
        }

        $data = [
            'title' => 'Halo Dashboard!',
            'heading' => 'Selamat Datang ' . $this->user['nama'] . ' 👋',
            'user' => $this->user,
            'totalHutang' => $totalHutang['nominal'],
            'totalPiutang' => $totalPiutang['nominal'],
            'totalPeminjam' => $totalPeminjam,
            'totalKondangan' => $totalKondangan,
            'dataPertahun' => $dataPertahun
        ];

        return view('home', $data);
    }
}
