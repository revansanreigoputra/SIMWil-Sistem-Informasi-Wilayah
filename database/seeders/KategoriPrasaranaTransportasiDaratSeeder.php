<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\KategoriPrasaranaTransportasiDarat;

class KategoriPrasaranaTransportasiDaratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Jalan Kabupaten'],
            ['nama' => 'Jalan Desa'],
        ];

        KategoriPrasaranaTransportasiDarat::insert($data);
    }
}
