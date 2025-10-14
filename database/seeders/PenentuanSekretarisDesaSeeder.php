<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\PenentuanSekretarisDesa;

class PenentuanSekretarisDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Diusulkan oleh Kepala Desa, Dipilih, Diangkat dan Ditetapkan oleh Bupati/Walikota'],
            ['nama' => 'Ditunjuk, diangkat dan ditetapkan oleh Camat atas nama Bupati/Walikota'],
            ['nama' => 'Ditunjuk, diangkat dan ditetapkan oleh Bupati/Walikota'],
        ];
        PenentuanSekretarisDesa::insert($data);
    }
}
