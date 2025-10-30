<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\PenentuanKepalaDesa;

class PenentuanKepalaDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Diangkat turun temurun oleh masyarakat setempat'],
            ['nama' => 'Ditunjuk Pemerintah Tingkat Atas'],
            ['nama' => 'Dipilih oleh perwakilan masyarakat'],
            ['nama' => 'Dipilih masyarakat secara langsung'],
        ];
        PenentuanKepalaDesa::insert($data);
    }
}
