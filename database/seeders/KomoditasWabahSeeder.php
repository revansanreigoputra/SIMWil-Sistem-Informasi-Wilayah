<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\KomoditasWabah;

class KomoditasWabahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Polio'],
            ['nama' => 'Muntaber'],
            ['nama' => 'Kolera'],
            ['nama' => 'Kelaparan'],
            ['nama' => 'Ispa'],
            ['nama' => 'Flu burung'],
            ['nama' => 'Demam berdarah'],
            ['nama' => 'Cikungunya'],
            ['nama' => 'Busung lapar'],
        ];
         KomoditasWabah::insert($data);
    }
}
