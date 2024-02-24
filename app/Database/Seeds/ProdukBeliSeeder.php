<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ProdukBeliSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 20; $i++) {
            $data = [
                'id' => $faker->randomNumber(6, true),
                'id_kategori' => $faker->randomElement([1, 2, 3]),
                'nama_produk' => $faker->words(3, true),
                'jenis_produk' => $faker->randomElement(['barang', 'jasa']),
                'jumlah_beli' => $faker->numberBetween(1, 30),
                'keperluan' => $faker->sentences(5, true),
                'catatan' => $faker->text(150),
                'tanggal_beli' => $faker->dateTimeBetween('-10 weeks')->format('Y-m-d'),
                'created_at' => Time::now('Asia/Jakarta')
            ];

            // Using Query Builder
            \Config\Database::connect()->table('produk_beli')->insert($data);
        }
    }
}
