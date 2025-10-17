<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TempatIbadahSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tempat_ibadahs')->insert([
            ['nama_tempat' => 'Pura'],
            ['nama_tempat' => 'Kelenteng'],
            ['nama_tempat' => 'Masjid'],
            ['nama_tempat' => 'Gereja'],
            ['nama_tempat' => 'Wihara'],
        ]);
    }
}