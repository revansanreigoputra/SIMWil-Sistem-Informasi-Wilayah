<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriTransportasi;

class KategoriTransportasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            ['nama_kategori' => 'Daratan'],
            ['nama_kategori' => 'Lautan'],
            ['nama_kategori' => 'Udara'],
        ];

        foreach ($kategori as $item) {
            KategoriTransportasi::create($item);
        }
    }
}