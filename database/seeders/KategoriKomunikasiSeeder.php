<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriKomunikasi;

class KategoriKomunikasiSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            ['nama' => 'Telepon'],
            ['nama' => 'Radio/TV'],
            ['nama' => 'Internet'],
        ];

        KategoriKomunikasi::insert($kategori);
    }
}