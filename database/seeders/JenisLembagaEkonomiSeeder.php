<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\KategoriLembagaEkonomi;
use App\Models\MasterPotensi\JenisLembagaEkonomi;
use Illuminate\Support\Facades\DB;

class JenisLembagaEkonomiSeeder extends Seeder
{
    public function run(): void
    {
        // Matikan sementara foreign key check biar bisa truncate
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Hapus data lama biar gak dobel
        JenisLembagaEkonomi::truncate();

        // Nyalakan lagi foreign key check
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Ambil data kategori yang sudah ada
        $kategoriJasa = KategoriLembagaEkonomi::where('nama', 'Jasa Lembaga Keuangan')->first();
        $kategoriUsaha = KategoriLembagaEkonomi::where('nama', 'Unit Usaha Desa')->first();

        // Pastikan kategori ditemukan
        if ($kategoriJasa && $kategoriUsaha) {
            JenisLembagaEkonomi::insert([
                [
                    'kategori_lembaga_ekonomi_id' => $kategoriJasa->id,
                    'nama' => 'Bank Harian',
                ],
                [
                    'kategori_lembaga_ekonomi_id' => $kategoriJasa->id,
                    'nama' => 'Koperasi',
                ],
                [
                    'kategori_lembaga_ekonomi_id' => $kategoriUsaha->id,
                    'nama' => 'Bank Swasta',
                ],
            ]);

            $this->command->info('Seeder JenisLembagaEkonomi berhasil diisi ulang.');
        } else {
            $this->command->warn('Beberapa kategori tidak ditemukan. Jalankan seeder kategori dulu.');
        }
    }
}
