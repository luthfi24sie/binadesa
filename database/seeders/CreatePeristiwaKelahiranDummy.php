<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreatePeristiwaKelahiranDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        // ambil semua warga
        $wargaIds = DB::table('warga')->pluck('warga_id');

        // pisahkan warga L & P untuk ayah / ibu
        $ayahIds = DB::table('warga')
            ->where('jenis_kelamin', 'L')
            ->pluck('warga_id');

        $ibuIds = DB::table('warga')
            ->where('jenis_kelamin', 'P')
            ->pluck('warga_id');

        foreach ($wargaIds as $wargaId) {

            DB::table('peristiwa_kelahiran')->insert([
                'warga_id' => $wargaId,
                'tgl_lahir' => $faker->dateTimeBetween('-25 years', '-1 year')->format('Y-m-d'),
                'tempat_lahir' => $faker->city,
                'ayah_warga_id' => $ayahIds->isNotEmpty()
                    ? $ayahIds->random()
                    : null,
                'ibu_warga_id' => $ibuIds->isNotEmpty()
                    ? $ibuIds->random()
                    : null,
                'no_akta' => $faker->unique()->numerify('AKTA-########'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
