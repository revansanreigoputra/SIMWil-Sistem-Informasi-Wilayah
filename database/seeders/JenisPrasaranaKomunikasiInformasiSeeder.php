<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\KategoriPrasaranaKomunikasiInformasi;
use App\Models\MasterPotensi\JenisPrasaranaKomunikasiInformasi;

class JenisPrasaranaKomunikasiInformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil data kategori yang sudah ada
        $Telepon = KategoriPrasaranaKomunikasiInformasi::where('nama', 'Telepon')->first();
        $RadioTV = KategoriPrasaranaKomunikasiInformasi::where('nama', 'Radio/TV')->first();

        // Pastikan kategori ditemukan
        if ($Telepon && $RadioTV) {
            JenisPrasaranaKomunikasiInformasi::insert([
                [
                    'kategori_prasarana_komunikasi_informasi_id' => $Telepon->id,
                    'nama' => 'Wartel',
                ],
                [
                    'kategori_prasarana_komunikasi_informasi_id' => $Telepon->id,
                    'nama' => 'Warnet',
                ],
                [
                    'kategori_prasarana_komunikasi_informasi_id' => $RadioTV->id,
                    'nama' => 'Jumlah Radio',
                ],
                [
                    'kategori_prasarana_komunikasi_informasi_id' => $RadioTV->id,
                    'nama' => 'Jumlah Parabola',
                ],
            ]);
        } 
    }
}
