<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\KategoriPrasaranaTransportasiLainnya;
use App\Models\MasterPotensi\JenisPrasaranaTransportasiLainnya;

class JenisPrasaranaTransportasiLainnyaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil data kategori yang sudah ada
        $PrasaranaTransportasiLaut = KategoriPrasaranaTransportasiLainnya::where('nama', 'Prasarana Transportasi Laut')->first();
        $SaranaTransportasiDarat = KategoriPrasaranaTransportasiLainnya::where('nama', 'Sarana Transportasi Darat')->first();

        // Pastikan kategori ditemukan
        if ($PrasaranaTransportasiLaut && $SaranaTransportasiDarat) {
            JenisPrasaranaTransportasiLainnya::insert([
                [
                    'kategori_prasarana_transportasi_lainnya_id' => $PrasaranaTransportasiLaut->id,
                    'nama' => 'Jumlah Kapal Barang',
                ],
                [
                    'kategori_prasarana_transportasi_lainnya_id' => $PrasaranaTransportasiLaut->id,
                    'nama' => 'Jumlah Perahu',
                ],
                [
                    'kategori_prasarana_transportasi_lainnya_id' => $SaranaTransportasiDarat->id,
                    'nama' => 'Truck',
                ],
                [
                    'kategori_prasarana_transportasi_lainnya_id' => $SaranaTransportasiDarat->id,
                    'nama' => 'Bus',
                ],
            ]);
        } 
    }
}
