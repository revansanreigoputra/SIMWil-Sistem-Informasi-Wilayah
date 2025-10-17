<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jpolahraga;

class JpolahragaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Arum Jeram'],
            ['nama' => 'Lapangan Sepak Bola'],
            ['nama' => 'Lapangan Golf'],
            ['nama' => 'Lapangan Basket'],
            ['nama' => 'Pacuan Kuda'],
        ];

        Jpolahraga::insert($data);
    }
}