<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsetAtapSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        DB::table('aset_ataps')->insert([
            ['nama' => 'Daun ilalang'],
            ['nama' => 'Seng'],
            ['nama' => 'Beto'],
            ['nama' => 'Kayu'],
            ['nama' => 'Genteng'],
            ['nama' => 'Bambu'],
            ['nama' => 'Daun lontar/gebang/enau'],
            ['nama' => 'Asbes'],
        ]);
    }
}
