<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // ← tambahkan baris ini

class AsetDindingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus semua data lama biar gak dobel
        DB::table('aset_dindings')->truncate();
        
        DB::table('aset_dindings')->insert([
            ['nama' => 'Tembok'],
            ['nama' => 'Tanah Liat'],
            ['nama' => 'Pelepah Kelapa/lontar/gebang'],
            ['nama' => 'Kayu'],
            ['nama' => 'Dedaunan'],
            ['nama' => 'Bambu'],
        ]);
    }
}
