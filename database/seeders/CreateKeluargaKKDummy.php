<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateKeluargaKKDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        // ambil semua warga (boleh kosong, karena kolom nullable)
        $wargaIds = DB::table('warga')->pluck('warga_id');

        // jumlah KK yang mau dibuat
        $jumlahKK = 30;

        for ($i = 0; $i < $jumlahKK; $i++) {

            DB::table('keluarga_kk')->insert([
                'kk_nomor' => $faker->unique()->numerify('################'), // 16 digit
                'kepala_keluarga_warga_id' => $wargaIds->isNotEmpty()
                    ? $wargaIds->random()
                    : null,
                'alamat' => $faker->streetAddress,
                'rt' => str_pad(rand(1, 10), 3, '0', STR_PAD_LEFT),
                'rw' => str_pad(rand(1, 10), 3, '0', STR_PAD_LEFT),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
