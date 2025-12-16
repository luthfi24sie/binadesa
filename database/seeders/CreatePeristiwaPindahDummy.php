<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreatePeristiwaPindahDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        // ambil semua warga
        $wargaIds = DB::table('warga')->pluck('warga_id');

        // alasan pindah (dummy)
        $alasanList = [
            'Pekerjaan',
            'Pendidikan',
            'Mengikuti keluarga',
            'Menikah',
            'Lingkungan',
            'Lainnya'
        ];

        // misal 25% warga pindah
        $jumlahData = (int) ($wargaIds->count() * 0.25);

        $wargaPindah = $wargaIds->random($jumlahData);

        foreach ($wargaPindah as $wargaId) {

            DB::table('peristiwa_pindah')->insert([
                'warga_id' => $wargaId,
                'tgl_pindah' => $faker->dateTimeBetween('-3 years', 'now')->format('Y-m-d'),
                'alamat_tujuan' => $faker->address,
                'alasan' => $alasanList[array_rand($alasanList)],
                'no_surat' => $faker->unique()->numerify('SKP-########'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
