<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\MasterPotensi\KategoriLembagaEkonomi;

class KategoriLembagaEkonomiSeeder extends Seeder
{
    public function run(): void
    {
        // Matikan sementara foreign key check
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Hapus data lama
        KategoriLembagaEkonomi::truncate();

        // Nyalakan lagi foreign key check
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Masukkan data baru
        KategoriLembagaEkonomi::insert([
            ['nama' => 'Jasa Lembaga Keuangan'],
            ['nama' => 'Unit Usaha Desa'],
        ]);
    }
}
