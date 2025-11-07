<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\JenisHutan;

class JenisHutanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Hutan Produksi'],
            ['nama' => 'Hutan Bakau'],
            ['nama' => 'Hutan Pinus'],
        ];

        JenisHutan::insert($data);
    }
}