<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\KomoditasBuah;

class KomoditasBuahSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Jeruk'],
            ['nama' => 'Alpukat'],
            ['nama' => 'Mangga  '],
        ];

        KomoditasBuah::insert($data);
    }
}