<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\SumberAirPanas;

class SumberAirPanasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Gunung Berapi'],
            ['nama' => 'Geiser'],
        ];

        SumberAirPanas::insert($data);
    }
}
