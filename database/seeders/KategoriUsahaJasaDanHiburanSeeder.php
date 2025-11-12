<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriUsahaJasaDanHiburanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('kategori_usaha_jasa_dan_hiburan')->truncate();

        DB::table('kategori_usaha_jasa_dan_hiburan')->insert([
            ['nama' => 'Jasa dan Perdagangan'],
            ['nama' => 'Jasa Hiburan'],
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
