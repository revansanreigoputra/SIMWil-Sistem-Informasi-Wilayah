<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\KategoriPrasaranaTransportasiDarat;
use App\Models\MasterPotensi\JenisPrasaranaTransportasiDarat;

class JenisPrasaranaTransportasiDaratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil data kategori yang sudah ada
        $JalanKabupaten = KategoriPrasaranaTransportasiDarat::where('nama', 'Jalan Kabupaten')->first();
        $JalanDesa = KategoriPrasaranaTransportasiDarat::where('nama', 'Jalan Desa')->first();

        // Pastikan kategori ditemukan
        if ($JalanKabupaten && $JalanDesa) {
            JenisPrasaranaTransportasiDarat::insert([
                [
                    'kategori_prasarana_transportasi_darat_id' => $JalanKabupaten->id,
                    'nama' => 'Panjang Jalan Tanah 2',
                ],
                [
                    'kategori_prasarana_transportasi_darat_id' => $JalanKabupaten->id,
                    'nama' => 'Panjang Jalan Aspal 2',
                ],
                [
                    'kategori_prasarana_transportasi_darat_id' => $JalanDesa->id,
                    'nama' => 'Panjang Jalan Tanah',
                ],
                [
                    'kategori_prasarana_transportasi_darat_id' => $JalanDesa->id,
                    'nama' => 'Panjang Jalan Aspal',
                ],
            ]);
        } 
    }
}
