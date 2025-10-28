<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\KategoriPrasaranaKomunikasiInformasi;

class KategoriPrasaranaKomunikasiInformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Telepon'],
            ['nama' => 'Radio/TV'],
            ['nama' => 'Internet'],
        ];

        KategoriPrasaranaKomunikasiInformasi::insert($data);
    }
}