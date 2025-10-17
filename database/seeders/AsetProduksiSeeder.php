<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsetProduksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('aset_produksis')->insert([
            ['nama' => 'Memiliki alat produksi dan pengolahan hasil industri bahan bakar dan gas skala keluarga/rumah tangga'],
            ['nama' => 'Memiliki alat produksi dan pengolah hasil Industri kerajinan keluarga skala kecil dan menengah'],
            ['nama' => 'Memiliki traktor'],
            ['nama' => 'Memiliki penggilingan padi'],
            ['nama' => 'Memiliki pabrik pengolahan hasil pertanian'],
            ['nama' => 'Memiliki kapal penangkap ikan'],
            ['nama' => 'Memiliki alat produksi dan pengolah hasil pertambangan'],
            ['nama' => 'Memiliki alat pengolahan hasil peternakan'],
            ['nama' => 'Memiliki alat pengolahan hasil perkebunan'],
            ['nama' => 'Memiliki alat pengolahan hasil perikanan',],
        ]);
    }
}
