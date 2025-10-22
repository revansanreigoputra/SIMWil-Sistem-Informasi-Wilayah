<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KomoditasAlatPerikananSeeder extends Seeder
{   
     public function run(): void
    {
        DB::table('komoditas_alat_perikanans')->truncate();

        DB::table('komoditas_alat_perikanans')->insert([
            ['nama' => 'Tambak'],
            ['nama' => 'Pukat'],
            ['nama' => 'Pancing'],
            ['nama' => 'Keramba'],
            ['nama' => 'Jermal'],
            ['nama' => 'Jala'],
        ]);

    }
}
