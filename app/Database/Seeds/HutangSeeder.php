<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class HutangSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $nominal = [
            50000,
            100000,
            150000,
            200000,
            250000,
            220000,
            120000,
            80000,
            30000,
            500000,
            450000,
        ];

        for ($i = 0; $i < count($nominal); $i++) {
            $data = [
                'nama' => $faker->name(),
                'nominal' => $nominal[$i],
                'jenis' => 'Hutang',
                'status' => 'Belum Lunas',
                'tanggal' => $faker->date(),
                'id_user' => 1,
                'created_at' => Time::now('Asia/Jakarta')
            ];

            // Using Query Builder
            \Config\Database::connect()->table('hutang')->insert($data);
        }
    }
}
