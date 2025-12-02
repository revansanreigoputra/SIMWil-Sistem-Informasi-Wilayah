<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\AreaWisata;

class AreaWisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = [
            ['nama' => 'Pantai'],
            ['nama' => 'Air Terjun'],
            ['nama' => 'Goa'],
            ['nama' => 'Danau'],
            ['nama' => 'Gunung'],
        ];

        foreach ($areas as $area) {
            AreaWisata::create($area);
        }
    }
}
