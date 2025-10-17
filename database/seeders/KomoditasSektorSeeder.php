<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KomoditasSektorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        DB::table('komoditas_sektor')->truncate();
        
        DB::table('komoditas_sektor')->insert([
            ['nama' => 'Peternakan'],
            ['nama' => 'Pertanian'],
            ['nama' => 'Pertambangan'],
            ['nama' => 'Perkebunan'],
            ['nama' => 'Perikanan'],
            ['nama' => 'Kerajinan'],
            ['nama' => 'Kehutanan'],
            ['nama' => 'Jasa dan Perdagangan'],
            ['nama' => 'Industri Kecil, Menengah dan Besar'],
        ]);
    }
}
