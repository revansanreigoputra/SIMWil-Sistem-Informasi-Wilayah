<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\JenisUsahaHiburan;

class JenisUsahaHiburanSeeder extends Seeder
{
    public function run(): void
    {
        // \DB::table('jenis_usaha_hiburan')->truncate();

        $data = [
            ['nama' => 'Organ Tunggal', 'kategori_id' => 2],
            ['nama' => 'Sandiwara', 'kategori_id' => 2],
            ['nama' => 'Pulsa Elektronik', 'kategori_id' => 1],
            ['nama' => 'Toko Sembako', 'kategori_id' => 1],
        ];

        foreach ($data as $item) {
            JenisUsahaHiburan::create($item);
        }
    }
}