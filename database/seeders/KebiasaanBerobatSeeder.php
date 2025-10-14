<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\KebiasaanBerobat;

class KebiasaanBerobatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Tidak diobati'],
            ['nama' => 'Paranormal'],
            ['nama' => 'Obat tradisional dari keluarga sendiri'],
            ['nama' => 'Obat tradisional dari dukun pengobatan alternatif'],
            ['nama' => 'Dukun Terlatih'],
            ['nama' => 'Dokter/puskesmas/mantri kesehatan/perawat/bidan/posyandu'],
        ];

        KebiasaanBerobat::insert($data);
    }
}
