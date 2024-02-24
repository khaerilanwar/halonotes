<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukBeliModel extends Model
{
    protected $table = 'produk_beli';
    protected $useAutoIncrement = false;
    protected $allowedFields = [
        'id', 'id_user', 'id_kategori', 'nama_produk', 'jenis_produk', 'jumlah_beli', 'keperluan', 'catatan', 'tanggal_beli', 'created_at'
    ];

    public function getData($id_user)
    {
        $builder = \Config\Database::connect()->table('produk_beli');
        $data = $builder
            ->select('produk_beli.id, produk_beli.id_user, produk_beli.nama_produk, produk_beli.jenis_produk, produk_beli.jumlah_beli, produk_beli.keperluan, produk_beli.catatan, produk_beli.tanggal_beli, kategori_produk_beli.nama_kategori')
            ->where('produk_beli.id_user', $id_user)
            ->join('kategori_produk_beli', 'kategori_produk_beli.id = produk_beli.id_kategori')->orderBy('tanggal_beli', 'desc')->get()->getResultArray();

        return $data;
    }
}
