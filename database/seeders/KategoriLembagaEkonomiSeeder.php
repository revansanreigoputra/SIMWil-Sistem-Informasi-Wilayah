<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\MasterPotensi\KategoriLembagaEkonomi;

class KategoriLembagaEkonomiSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        KategoriLembagaEkonomi::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        KategoriLembagaEkonomi::insert([
            ['nama' => 'Jasa Lembaga Keuangan'],
            ['nama' => 'Unit Usaha Desa'],
        ]);
    }
}
