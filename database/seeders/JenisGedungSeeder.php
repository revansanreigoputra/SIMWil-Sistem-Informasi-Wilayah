<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\JenisGedung;

class JenisGedungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Gedung Kampus PTS'],
            ['nama' => 'Gedung Kampus PTN'],
        ];

        JenisGedung::insert($data);
    }
}
