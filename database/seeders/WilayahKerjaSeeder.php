<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WilayahKerja; // <-- Import Modelnya

class WilayahKerjaSeeder extends Seeder
{
    public function run(): void
    {
        // Mencari berdasarkan 'nama', jika belum ada, akan membuatnya
        WilayahKerja::updateOrCreate(['nama' => 'Wilayah Barat']);
        WilayahKerja::updateOrCreate(['nama' => 'Wilayah Timur']);
        WilayahKerja::updateOrCreate(['nama' => 'Wilayah Tengah']);
        WilayahKerja::updateOrCreate(['nama' => 'Wilayah Pusat']);
        WilayahKerja::updateOrCreate(['nama' => 'Wilayah Utara']);
    }
}
