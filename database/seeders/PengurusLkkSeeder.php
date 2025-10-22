<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\PengurusLkk;

class PengurusLkkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Ditunjuk dan Diangkat oleh Camat'],
            ['nama' => 'Ditunjuk dan diangkat oleh Kepala Desa/ Lurah'],
            ['nama' => 'Ditunjuk dan diangkat oleh Ketua LKD/LKK'],
            ['nama' => 'Dipilih oleh rakyat secara langsung'],
        ];
        PengurusLkk::insert($data);
    }
}
