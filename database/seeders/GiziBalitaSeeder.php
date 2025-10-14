<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GiziBalitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gizi_balita')->insert([
            ['nama' => 'Balita bergizi lebih'],
            ['nama' => 'Balita bergizi kurang'],
            ['nama' => 'Balita bergizi buruk'],
            ['nama' => 'Balita bergizi baik'],
        ]);
    }
}
