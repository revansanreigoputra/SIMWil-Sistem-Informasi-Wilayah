<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\JenisAirMinum;

class JenisAirMinumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data = [
            ['nama' => 'Sumur Pompa'],
            ['nama' => 'Sumur Gali'],
            ['nama' => 'Sungai'],
            ['nama' => 'Mata Air'],
            ['nama' => 'PAM'],
        ];

        JenisAirMinum::insert($data);
    }
}
