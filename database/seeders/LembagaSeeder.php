<?php

namespace Database\Seeders;

use Illuminate\support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LembagaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('lembagas')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = [
           // PEMERINTAHAN (Total 5 Entri)
            ['jenis_lembaga' => 'Pemerintahan', 'nama_lembaga' => 'Kementerian'],
            ['jenis_lembaga' => 'Pemerintahan', 'nama_lembaga' => 'DPRD'],
            ['jenis_lembaga' => 'Pemerintahan', 'nama_lembaga' => 'Pemda Provinsi'],
            ['jenis_lembaga' => 'Pemerintahan', 'nama_lembaga' => 'Pemda Kab/Kota'],
            ['jenis_lembaga' => 'Pemerintahan', 'nama_lembaga' => 'Kantor Desa'],

            // KEMASYARAKATAN (Hanya konsep inti, hilangkan "Anggota" atau "Pengurus")
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Karang Taruna'], 
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'LPM/LKMD'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Organisasi Keagamaan'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Organisasi Profesi'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Org. Tani/Nelayan'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'PKK'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus RT/RW'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Posyandu/Poskamling'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Yayasan'],

            // EKONOMI
            ['jenis_lembaga' => 'Ekonomi', 'nama_lembaga' => 'Koperasi'],
            ['jenis_lembaga' => 'Ekonomi', 'nama_lembaga' => 'BUMN/BUMD'],
            ['jenis_lembaga' => 'Ekonomi', 'nama_lembaga' => 'UMKM'],
        ]; 

        DB::table('lembagas')->insert($data);
    }
}
