<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class KondanganSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $nominal = [
            50000,
            100000,
            40000,
            35000,
            45000,
            80000,
            30000,
        ];

        for ($i = 0; $i < 20; $i++) {
            $data = [
                'id' => rand(100000000, 999999999),
                'nama' => $faker->name(),
                'nominal' => $nominal[rand(0, 6)],
                'status' => 'Belum Datang',
                'tanggal' => $faker->dateTimeBetween('-4 weeks')->format('Y-m-d'),
                'id_user' => 1,
                'alamat' => $faker->city(),
                'created_at' => Time::now('Asia/Jakarta')
            ];

            // Using Query Builder
            \Config\Database::connect()->table('kondangan')->insert($data);
        }
    }
}
