<?php

namespace Database\Seeders;

use App\Models\MasterDDK\GolonganDarah;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GolonganDarahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['golongan_darah' => 'A'],
            ['golongan_darah' => 'B'],
            ['golongan_darah' => 'AB'],
            ['golongan_darah' => 'O'],
        ];

        DB::table('golongan_darahs')->insert($data);
    }
}
