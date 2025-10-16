<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\Provinsi;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Jawa Tengah'],
            ['nama' => 'Jawa Barat'],
        ];
        Provinsi::insert($data);
    }
}
