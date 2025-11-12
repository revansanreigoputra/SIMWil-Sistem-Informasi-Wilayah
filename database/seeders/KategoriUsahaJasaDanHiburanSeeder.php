<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\MasterPotensi\KategoriUsahaJasaDanHiburan;

class KategoriUsahaJasaDanHiburanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('kategori_usaha_jasa_dan_hiburan')->truncate();
        
        DB::table('kategori_usaha_jasa_dan_hiburan')->insert([
            ['nama' => 'Jasa dan Perdagangan'],
            ['nama' => 'Jasa Hiburan'],
        ]);
    }
}