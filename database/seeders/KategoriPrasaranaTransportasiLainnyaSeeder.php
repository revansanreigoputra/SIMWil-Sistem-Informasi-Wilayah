<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\KategoriPrasaranaTransportasiLainnya;

class KategoriPrasaranaTransportasiLainnyaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Prasarana Transportasi Laut'],
            ['nama' => 'Sarana Transportasi Darat'],
        ];

        KategoriPrasaranaTransportasiLainnya::insert($data);
    }
}
