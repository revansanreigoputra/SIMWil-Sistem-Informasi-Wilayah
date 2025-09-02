<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class KBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data = [
            ['kb' => 'KB Alamiah/Kalender'],
            ['kb' => 'Kondom'],
            ['kb' => 'Obat Tradisional'],
            ['kb' => 'Pil'],
            ['kb' => 'Spiral'],
            ['kb' => 'Suntik'],
            ['kb' => 'Susuk KB (Implant)'],
            ['kb' => 'Tidak Menggunakan kontras'],
            ['kb' => 'Tidak Menjawab'],
            ['kb' => 'Tubektomi'],
            ['kb' => 'Vasektomi'],
        ];

        DB::table('kb')->insert($data);
    }
}
