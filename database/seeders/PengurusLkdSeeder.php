<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\PengurusLkd;

class PengurusLkdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Ditunjuk dan Diangkat oleh Camat'],
            ['nama' => 'Ditunjuk dan diangkat oleh Kepala Desa/Lurah'],
            ['nama' => 'Dipilih oleh rakyat secara langsung'],
        ];
        PengurusLkd::insert($data);
    }
}
