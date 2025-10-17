<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisPotensiAirSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jenis_potensi_air')->insert([
            ['nama' => 'Jembatan', 'kondisi_pemanfaatan' => 'Tidak'],
            ['nama' => 'Rawa', 'kondisi_pemanfaatan' => 'Tidak'],
            ['nama' => 'Danau (Ha)', 'kondisi_pemanfaatan' => 'Ya'],
            ['nama' => 'Bendungan (Ha)', 'kondisi_pemanfaatan' => 'Ya'],
        ]);
    }
}
