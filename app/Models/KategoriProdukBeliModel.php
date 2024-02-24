<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriProdukBeliModel extends Model
{
    protected $table = 'kategori_produk_beli';
    protected $allowedFields = ['id_user', 'nama_kategori', 'akronim'];

    public function getData($id_user)
    {
        $builder = \Config\Database::connect()->table('kategori_produk_beli');
        $builder->select('kategori_produk_beli.nama_kategori')
            ->selectCount('produk_beli.id', 'jumlah_catatan')
            ->join('produk_beli', 'kategori_produk_beli.id = produk_beli.id_kategori', 'left')
            ->where('produk_beli.id_user', $id_user)
            ->groupBy('kategori_produk_beli.nama_kategori');
        $categories = $builder->get()->getResultArray();

        return $categories;
    }
}
