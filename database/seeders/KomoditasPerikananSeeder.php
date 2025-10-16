<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\KomoditasPerikanan;

class KomoditasPerikananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data = [
            ['nama' => 'Udang/Lobster'],
            ['nama' => 'Tuna'],
            ['nama' => 'Tongkol/Cakalang'],
            ['nama' => 'Teripang'],
            ['nama' => 'Tengiri'],
            ['nama' => 'Teri'],
            ['nama' => 'Tembang'],
            ['nama' => 'Sepat'],
            ['nama' => 'Sarden'],
            ['nama' => 'Salmon'],
        ];
        KomoditasPerikanan::insert($data);
    }
}
