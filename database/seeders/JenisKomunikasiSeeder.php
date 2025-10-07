<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisKomunikasi;

class JenisKomunikasiSeeder extends Seeder
{
    public function run(): void
    {
        $jenis = [
            // Telepon
            ['kategori_id' => 1, 'nama' => 'Wartel'],
            ['kategori_id' => 1, 'nama' => 'Warnet'],
            ['kategori_id' => 1, 'nama' => 'Jaringan Fiber'],

            // Radio/TV
            ['kategori_id' => 2, 'nama' => 'Jumlah Parabola'],
            ['kategori_id' => 2, 'nama' => 'Pemancar Lokal'],

            // Internet
            ['kategori_id' => 3, 'nama' => 'Hotspot Publik'],
            ['kategori_id' => 3, 'nama' => 'BTS (Menara Sinyal)'],
        ];

        JenisKomunikasi::insert($jenis);
    }
}