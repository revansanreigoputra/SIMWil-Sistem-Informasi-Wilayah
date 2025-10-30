<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\KomoditasHasilTernak;

class KomoditasHasilTernakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data = [
            ['nama' => 'Ayam'],
            ['nama' => 'Bebek'],
        ];
         KomoditasHasilTernak::insert($data);
    }
}
