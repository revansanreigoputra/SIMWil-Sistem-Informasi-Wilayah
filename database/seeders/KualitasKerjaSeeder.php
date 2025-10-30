<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\KualitasKerja;

class KualitasKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Penduduk usia 18 - 56 tahun yang tidak tamat SD'],
            ['nama' => 'Penduduk usia 18 - 56 tahun yang tamat SLTP'],
            ['nama' => 'Penduduk usia 18 - 56 tahun yang tamat SLTA'],
            ['nama' => 'Penduduk usia 18 - 56 tahun yang tamat SD'],
            ['nama' => 'Penduduk usia 18 - 56 tahun yang tamat Perguruan Tinggi'],
            ['nama' => 'Penduduk usia 18 - 56 tahun yang buta aksara dan huruf/angka latin'],
        ];
         KualitasKerja::insert($data);
    }
}
