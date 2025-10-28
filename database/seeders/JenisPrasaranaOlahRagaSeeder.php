<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\JenisPrasaranaOlahRaga;

class JenisPrasaranaOlahRagaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Pacuan Kuda'],
            ['nama' => 'Lapangan Basket'],
            ['nama' => 'Lapangan Golf'],
            ['nama' => 'Lapangan Sepak Bola'],
            ['nama' => 'Arum Jeram'],
        ];

       JenisPrasaranaOlahRaga::insert($data);
    }
}
