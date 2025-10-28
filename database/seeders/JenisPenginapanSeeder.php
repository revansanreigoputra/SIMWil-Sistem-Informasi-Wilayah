<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\JenisPenginapan;

class JenisPenginapanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Hotel'],
            ['nama' => 'Biliard'],
            ['nama' => 'Diskotik'],
        ];

       JenisPenginapan::insert($data);
    }
}
