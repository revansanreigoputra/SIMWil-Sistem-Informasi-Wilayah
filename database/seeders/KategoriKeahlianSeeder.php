<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriKeahlian; // <-- Import Modelnya

class KategoriKeahlianSeeder extends Seeder
{
    public function run(): void
    {
        KategoriKeahlian::updateOrCreate(['nama' => 'Pemberdayaan Masyarakat']);
        KategoriKeahlian::updateOrCreate(['nama' => 'Tenaga Ahli Pusat']);
        KategoriKeahlian::updateOrCreate(['nama' => 'Keuangan Desa']);
        KategoriKeahlian::updateOrCreate(['nama' => 'Koordinator Wilayah']);
    }
}
