<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\PemasaranHasil;

class PemasaranHasilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Tidak dijual'],
            ['nama' => 'Dijual melalui Tengkulak'],
            ['nama' => 'Dijual melalui Pengecer'],
            ['nama' => 'Dijual melalui KUD'],
            ['nama' => 'Dijual langsung ke konsumen'],
            ['nama' => 'Dijual ke pasar'],
            ['nama' => 'Dijual ke Lumbung Pangan Desa/kel'],
        ];
         PemasaranHasil::insert($data);
    }
}
