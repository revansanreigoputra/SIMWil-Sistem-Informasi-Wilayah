<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanProduksiKehutananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('satuan_produksi_kehutanan')->insert([
            ['nama' => 'BATANG/TH'],
            ['nama' => 'LITER/TH'],
            ['nama' => 'M3/TH'],
            ['nama' => 'TON/TH'],
        ]);
    }
}