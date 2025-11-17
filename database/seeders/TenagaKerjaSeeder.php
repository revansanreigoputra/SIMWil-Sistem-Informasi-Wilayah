<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MasterDDK\TenagaKerja; // Import the TenagaKerja model

class TenagaKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenagaKerjaData = [
            'Angkatan kerja',
            'Penduduk usia 0-6 tahun',
            'Penduduk masih sekolah 7-18 tahun',
            'Penduduk usia 18-56 tahun',
            'Penduduk usia 18-56 tahun yang belum atau tidak bekerja',
            'Penduduk usia 18-56 tahun yang masih bekerja',
            'Penduduk usia 56 tahun ke atas',
        ];

        foreach ($tenagaKerjaData as $data) {
            TenagaKerja::create(['tenaga_kerja' => $data]);
        }
    }
}
