<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriProdukBeliSeeder extends Seeder
{
    public function run()
    {
        $categories = ['Personal', 'Bisnis', 'Style'];
        foreach ($categories as $category) {
            $data = [
                'nama_kategori' => $category
            ];
            \Config\Database::connect()->table('kategori_produk_beli')->insert($data);
        }
    }
}
