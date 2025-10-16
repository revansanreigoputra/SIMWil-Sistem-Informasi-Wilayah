<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\PenentuanPerangkatDesa;

class PenentuanPerangkatDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Ditunjuk, diangkat dan ditetapkan oleh Camat/Kepala Distrik/Sebutan lain'],
            ['nama' => 'Ditunjuk, diangkat dan ditetapkan oleh Kepala Desa serta dilaporkan ke Camat'],
            ['nama' => 'Ditunjuk, diangkat dan ditetapkan oleh Kepala Desa serta disahkan Camat'],
        ];
        PenentuanPerangkatDesa::insert($data);
    }
}
