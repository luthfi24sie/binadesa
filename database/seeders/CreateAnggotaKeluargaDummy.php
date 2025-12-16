<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateAnggotaKeluargaDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // ambil id dari tabel relasi
        $kkIds = DB::table('keluarga_kk')->pluck('kk_id');
        $wargaIds = DB::table('warga')->pluck('warga_id');

        $hubunganList = [
            'Kepala Keluarga',
            'Istri',
            'Anak',
            'Orang Tua',
            'Saudara'
        ];

        foreach ($kkIds as $kkId) {

            // tiap KK punya 3–7 anggota
            $jumlahAnggota = rand(3, 7);

            // ambil warga secara acak
            $wargaDipakai = $wargaIds->random($jumlahAnggota);

            foreach ($wargaDipakai as $index => $wargaId) {
                DB::table('anggota_keluarga')->insert([
                    'kk_id' => $kkId,
                    'warga_id' => $wargaId,
                    'hubungan' => $index === 0
                        ? 'Kepala Keluarga'
                        : $hubunganList[array_rand($hubunganList)],
                ]);
            }
        }
    }
}
