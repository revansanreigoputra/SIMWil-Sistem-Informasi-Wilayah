<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisLantai;

class JenisLantaiSeeder extends Seeder
{
    public function run()
    {
        $lantais = [
            ['nama_lantai' => 'Kayu'],
            ['nama_lantai' => 'Keramik'],
            ['nama_lantai' => 'Semen'],
            ['nama_lantai' => 'Tanah'],
        ];

        foreach ($lantais as $lantai) {
            JenisLantai::updateOrCreate(['nama_lantai' => $lantai['nama_lantai']], $lantai);
        }
    }
}
