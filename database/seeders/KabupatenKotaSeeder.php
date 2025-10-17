<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\KabupatenKota;

class KabupatenKotaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['provinsi' => 'Jawa Barat', 'nama' => 'Cirebon'],
            ['provinsi' => 'Jawa Tengah', 'nama' => 'Tegal'],
            ['provinsi' => 'Jawa Barat', 'nama' => 'Indramayu'],
        ];

        KabupatenKota::insert($data);
    }
}
