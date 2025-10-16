<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisTransportasi;
use App\Models\KategoriTransportasi;

class JenisTransportasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoriDaratan = KategoriTransportasi::where('nama_kategori', 'Daratan')->first();
        $kategoriLautan = KategoriTransportasi::where('nama_kategori', 'Lautan')->first();
        $kategoriUdara = KategoriTransportasi::where('nama_kategori', 'Udara')->first();

        $jenis = [
            ['kategori_id' => $kategoriDaratan->id, 'nama_jenis' => 'Mobil'],
            ['kategori_id' => $kategoriDaratan->id, 'nama_jenis' => 'Motor'],
            ['kategori_id' => $kategoriLautan->id, 'nama_jenis' => 'Kapal Motor'],
            ['kategori_id' => $kategoriLautan->id, 'nama_jenis' => 'Perahu'],
            ['kategori_id' => $kategoriUdara->id, 'nama_jenis' => 'Pesawat Terbang'],
            ['kategori_id' => $kategoriUdara->id, 'nama_jenis' => 'Helikopter'],
        ];

        foreach ($jenis as $item) {
            JenisTransportasi::create($item);
        }
    }
}