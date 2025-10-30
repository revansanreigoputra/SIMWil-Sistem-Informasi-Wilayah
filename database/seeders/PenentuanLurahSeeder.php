<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\PenentuanLurah;

class PenentuanLurahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Ditunjuk dan diangkat oleh Bupati/Walikota secara langsung'],
            ['nama' => 'Ditunjuk dan diangkat oleh Camat sesuai Delegasi Kewenangan dari Bupati/Walikota'],
        ];
        PenentuanLurah::insert($data);
    }
}
