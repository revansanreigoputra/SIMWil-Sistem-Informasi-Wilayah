<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusKepemilikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status_kepemilikan')->truncate();
        
        DB::table('status_kepemilikan')->insert([
            ['nama' => 'Pinjam Pakai'],
            ['nama' => 'Sewa/Kontrak'],
            ['nama' => 'Milik Keluarga'],
            ['nama' => 'Milik Orang Tua'],
            ['nama' => 'Milik Sendiri'],
        ]);
    }
}
