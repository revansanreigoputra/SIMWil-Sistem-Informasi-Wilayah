<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\KomoditasHutan;

class KomoditasHutanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Bambu'],
            ['nama' => 'Cemara'],
        ];
         KomoditasHutan::insert($data);
    }
}
