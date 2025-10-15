<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\KeluargaBerencana;

class KeluargaBerencanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Vasektomi'],
            ['nama' => 'Tubektomi'],
            ['nama' => 'Tidak Menjawab'],
            ['nama' => 'Tidak Menggunakan kontras'],
            ['nama' => 'Susuk KB (Implant)'],
            ['nama' => 'Suntik'],
            ['nama' => 'Spiral'],
            ['nama' => 'Pil'],
            ['nama' => 'Obat Tradisional'],
            ['nama' => 'Kondom'],
        ];

        KeluargaBerencana::insert($data);
    }
}
