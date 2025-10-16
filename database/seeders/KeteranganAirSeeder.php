<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\KeteranganAir;

class KeteranganAirSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Berbau'],
            ['nama' => 'Berwarna'],
            ['nama' => 'Berasa'],
            ['nama' => 'Baik'],
        ];

        KeteranganAir::insert($data);
    }
}
