<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisDindingSeeder extends Seeder
{
    public function run(): void
    {
        $jenis = [
            'Bambu',
            'Dedaunan',
            'Kayu',
            'Pelepah kelapa/lontar/gebang',
            'Tanah liat',
            'Tembok',
        ];

        foreach ($jenis as $item) {
            DB::table('jenis_dindings')->insert([
                'nama_dinding' => $item,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
