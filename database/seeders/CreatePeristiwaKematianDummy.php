<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreatePeristiwaKematianDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        // ambil semua warga
        $wargaIds = DB::table('warga')->pluck('warga_id');

        // daftar sebab kematian (dummy)
        $sebabList = [
            'Sakit',
            'Kecelakaan',
            'Usia lanjut',
            'Serangan jantung',
            'Stroke',
            'Lainnya'
        ];

        // misal hanya sebagian warga (30%) yang meninggal
        $jumlahData = (int) ($wargaIds->count() * 0.3);

        $wargaMeninggal = $wargaIds->random($jumlahData);

        foreach ($wargaMeninggal as $wargaId) {

            DB::table('peristiwa_kematian')->insert([
                'warga_id' => $wargaId,
                'tgl_meninggal' => $faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
                'sebab' => $sebabList[array_rand($sebabList)],
                'lokasi' => $faker->city,
                'no_surat' => $faker->unique()->numerify('SKM-########'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
