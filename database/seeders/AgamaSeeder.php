<?php

namespace Database\Seeders;
Use App\Models\MasterDDK\Agama;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $data = [
            ['agama' => 'Islam'],
            ['agama' => 'Kristen'],
            ['agama' => 'Hindu'],
            ['agama' => 'Buddha'],
            ['agama' => 'Konghucu'],
            ['agama' => 'Khatolik'],
        ];

        DB::table('agama')->insert($data);
    }
}
