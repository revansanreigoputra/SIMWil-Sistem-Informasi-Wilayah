<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\KomoditasObat;

class KomoditasObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data = [
            ['nama' => 'Buah Merah'],
            ['nama' => 'Akar Wangi'],
        ];
         KomoditasObat::insert($data);
    }
}
