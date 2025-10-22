<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengelolaanPotensiAirSeeder extends Seeder
{
    public function run(): void
    {
         DB::table('pengelolaan_potensi_air')->truncate();

        DB::table('pengelolaan_potensi_air')->insert([
            ['nama' => 'Buang Air Besar', 'kategori' => 'Pemanfaatan'],
            ['nama' => 'Sayuran', 'kategori' => 'Pemanfaatan'],
            ['nama' => 'Irigasi', 'kategori' => 'Pemanfaatan'],
            ['nama' => 'Prasarana Transportasi', 'kategori' => 'Pemanfaatan'],
            ['nama' => 'Keruh', 'kategori' => 'Kondisi'],
            ['nama' => 'Kering', 'kategori' => 'Kondisi'],
            ['nama' => 'Jernih dan Tidak Tercemar', 'kategori' => 'Kondisi'],
            ['nama' => 'Berkurangnya Biota Sungai', 'kategori' => 'Kondisi'],
        ]);
    }
}
