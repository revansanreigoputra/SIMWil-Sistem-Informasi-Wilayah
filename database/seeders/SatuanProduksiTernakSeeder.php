<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\SatuanProduksiTernak;

class SatuanProduksiTernakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'KG/TH'],
            ['nama' => 'BATANG/TH'],
        ];

        SatuanProduksiTernak::insert($data);
    }
}
