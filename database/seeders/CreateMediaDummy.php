<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateMediaDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // contoh ref_table yang dipakai di project kamu
        // sesuaikan kalau mau
        $refTables = [
            'warga',
            'keluarga_kk',
        ];

        foreach ($refTables as $table) {

            // ambil semua ID dari tabel referensi
            if (!DB::getSchemaBuilder()->hasTable($table)) {
                continue;
            }

            $ids = DB::table($table)->pluck(
                $table === 'warga' ? 'warga_id' : 'kk_id'
            );

            foreach ($ids as $id) {

                // 1–3 media per data
                $jumlahMedia = rand(1, 3);

                for ($i = 1; $i <= $jumlahMedia; $i++) {
                    DB::table('media')->insert([
                        'ref_table' => $table,
                        'ref_id' => $id,
                        'file_url' => "uploads/{$table}/dummy_{$id}_{$i}.jpg",
                        'caption' => "Foto {$table} {$id}",
                        'mime_type' => 'image/jpeg',
                        'sort_order' => $i,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
