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
        // disable foreign key checks so truncate can run when other tables
        // reference this table (e.g. menurut_sektor_usahas)
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('komoditas_sektor')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

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
