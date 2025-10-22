<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisAtapSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_ataps')->insert([
            ['nama_jenis_atap' => 'Asbes'],
            ['nama_jenis_atap' => 'Daun lontar/gebang/enau'],
            ['nama_jenis_atap' => 'Bambu'],
            ['nama_jenis_atap' => 'Genteng'],
            ['nama_jenis_atap' => 'Kayu'],
            ['nama_jenis_atap' => 'Beto'],
            ['nama_jenis_atap' => 'Seng'],
            ['nama_jenis_atap' => 'Daun ilalang'],
        ]);
    }
}
