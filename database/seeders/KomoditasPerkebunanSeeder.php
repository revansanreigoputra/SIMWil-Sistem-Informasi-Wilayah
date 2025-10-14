<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\KomoditasPerkebunan;

class KomoditasPerkebunanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data = [
            ['nama' => 'Kemiri'],
            ['nama' => 'Cengkel'],
        ];
         KomoditasPerkebunan::insert($data);
    }
}
