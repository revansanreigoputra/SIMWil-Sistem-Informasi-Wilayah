<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kecamatan;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kecamatan::create([
            'nama_kecamatan' => 'Kecamatan Sukamaju',
        ]);
        Kecamatan::create([
            'nama_kecamatan' => 'Kecamatan Mulyajaya',
        ]);
    }
}
