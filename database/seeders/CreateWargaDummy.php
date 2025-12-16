<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use DB;

class CreateWargaDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
{
    $faker = \Faker\Factory::create('id_ID'); // biar data Indonesia

    foreach (range(1, 100) as $index) {
        DB::table('warga')->insert([
            'no_ktp' => $faker->unique()->numerify('################'), // 16 digit
            'nama' => $faker->name,
            'jenis_kelamin' => $faker->randomElement(['L', 'P']),
            'agama' => $faker->randomElement([
                'Islam',
                'Kristen',
                'Katolik',
                'Hindu',
                'Buddha',
                'Konghucu'
            ]),
            'pekerjaan' => $faker->jobTitle,
            'telp' => $faker->phoneNumber,
            'email' => $faker->unique()->safeEmail,
        ]);
    }
}
}
