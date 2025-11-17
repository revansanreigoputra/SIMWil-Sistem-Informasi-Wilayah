<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MasterDDK\KualitasAngkatanKerja;

class KualitasAngkatanKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kualitasAngkatanKerja = [
            ['kualitas_angkatan_kerja' => 'Penduduk usia 18-56 tahun yang buta aksara dan huruf/angka latin'],
            ['kualitas_angkatan_kerja' => 'Penduduk usia 18-56 tahun yang tamat perguruan tinggi'],
            ['kualitas_angkatan_kerja' => 'Penduduk usia 18-56 tahun yang tamat SD'],
            ['kualitas_angkatan_kerja' => 'Penduduk usia 18-56 tahun yang tamat SLTA'],
            ['kualitas_angkatan_kerja' => 'Penduduk usia 18-56 tahun yang tamat SLTP'],
            ['kualitas_angkatan_kerja' => 'Penduduk usia 18-56 tahun yang tidak tamat SD'],
        ];

        foreach ($kualitasAngkatanKerja as $data) {
            KualitasAngkatanKerja::create($data);
        }
    }
}
