<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsetTanahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('aset_tanah')->insert([
            ['nama' => 'Memiliki tanah lebih dari 5,0 ha'],
            ['nama' => 'Memiliki tanah antara 1,0 - 5,0 ha'],
            ['nama' => 'Memiliki tanah antara 0,9 - 1,0 ha'],
            ['nama' => 'Memiliki tanah antara 0,8 - 0,9 ha'],
            ['nama' => 'Memiliki tanah antara 0,7 - 0,8 ha'],
            ['nama' => 'Memiliki tanah antara 0,6 - 0,7 ha'],
            ['nama' => 'Memiliki tanah antara 0,5 - 0,6 ha'],
            ['nama' => 'Memiliki tanah antara 0,4 - 0,5 ha'],
            ['nama' => 'Memiliki tanah antara 0,3 - 0,4 ha'],
            ['nama' => 'Memiliki tanah antara 0,2 - 0,3 ha'],
        ]);
    }
}
