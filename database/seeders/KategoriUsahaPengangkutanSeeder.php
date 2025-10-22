<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\KategoriUsahaPengangkutan;

class KategoriUsahaPengangkutanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Angkutan Laut'],
            ['nama' => 'Angkutan Darat'],
        ];

        KategoriUsahaPengangkutan::insert($data);
    }
}
