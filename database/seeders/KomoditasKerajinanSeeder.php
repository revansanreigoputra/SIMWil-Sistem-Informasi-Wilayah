<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\KomoditasKerajinan;

class KomoditasKerajinanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Tukang Sumur'],
            ['nama' => 'Tukang Rias'],
            ['nama' => 'Tukang Kue'],
            ['nama' => 'Tukang Kayu'],
            ['nama' => 'Montir'],
            ['nama' => 'Tukang Jahit'],
            ['nama' => 'Tukang Batu'],
            ['nama' => 'Tukang Anyaman'],
            ['nama' => 'Pengrajin Industri Rumah Tangga Lainnya'],
        ];
         KomoditasKerajinan::insert($data);
    }
}
