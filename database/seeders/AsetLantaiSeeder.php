<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsetLantaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Bersihkan data lama biar gak dobel
        DB::table('aset_lantais')->truncate();

        // Masukkan data baru
        DB::table('aset_lantais')->insert([
            ['nama' => 'Tanah'],
            ['nama' => 'Plester/Semen'],
            ['nama' => 'Keramik'],
            ['nama' => 'Kayu'],
        ]);
    }
}
