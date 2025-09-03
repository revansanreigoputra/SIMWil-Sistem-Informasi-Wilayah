<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use App\Models\MasterDDK\Kewarganegaraan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KewarganegaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kewarganegaraan' => 'Warga Negara Indonesia'],
            ['kewarganegaraan' => 'Warga Negara Asing'],
            ['kewarganegaraan' => 'Dwi Kewarganegaraan'],
        ];

        DB::table('kewarganegaraans')->insert($data);
    }
}
