<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\KategoriSekolah;
use App\Models\MasterPotensi\JenisSekolahTingkatan;

class JenisSekolahTingkatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil data kategori yang sudah ada
        $SekolahNegeri = KategoriSekolah::where('nama', 'Sekolah Negeri')->first();
        $SekolahIslam = KategoriSekolah::where('nama', 'Sekolah Islam')->first();

        // Pastikan kategori ditemukan
        if ($SekolahNegeri && $SekolahIslam) {
            JenisSekolahTingkatan::insert([
                [
                    'kategori_sekolah_id' => $SekolahNegeri->id,
                    'nama' => 'SMK',
                ],
                [
                    'kategori_sekolah_id' => $SekolahNegeri->id,
                    'nama' => 'SMP',
                ],
                [
                    'kategori_sekolah_id' => $SekolahIslam->id,
                    'nama' => 'MA',
                ],
                [
                    'kategori_sekolah_id' => $SekolahIslam->id,
                    'nama' => 'MI',
                ],
            ]);
        } else {
            $this->command->warn('⚠️ Beberapa kategori tidak ditemukan. Pastikan seeder kategori sudah dijalankan dulu.');
        }
    }
}
