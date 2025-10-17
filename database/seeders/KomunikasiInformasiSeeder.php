<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KomunikasiInformasi;
use Carbon\Carbon;

class KomunikasiInformasiSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'tanggal' => Carbon::now(),
                'desa_id' => 1, // Pastikan untuk menyesuaikan dengan ID desa yang ada
                'kategori_id' => 1, // Telepon
                'jenis_id' => 2,    // Warnet
                'jumlah' => 3,
                'satuan' => 'Unit',
            ],
            [
                'tanggal' => Carbon::now(),
                'desa_id' => 1, // Pastikan untuk menyesuaikan dengan ID desa yang ada
                'kategori_id' => 2, // Radio/TV
                'jenis_id' => 4,    // Jumlah Parabola
                'jumlah' => 12,
                'satuan' => 'Sinyal',
            ],
            [
                'tanggal' => Carbon::now(),
                'desa_id' => 2, // Pastikan untuk menyesuaikan dengan ID desa yang ada
                'kategori_id' => 3, // Internet
                'jenis_id' => 7,    // BTS
                'jumlah' => 5,
                'satuan' => 'Menara',
            ],
        ];

        KomunikasiInformasi::insert($data);
    }
}