<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PotensiKelembagaan\PartisipasiPolitik;

class PartisipasiPolitikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Pemilu Kepala Desa'],
            ['nama' => 'Pemilu Kepala Kecamatan'],
        ];
        PartisipasiPolitik::insert($data);
    }
}
