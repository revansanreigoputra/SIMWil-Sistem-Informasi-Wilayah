<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\SakitKelainan;

class SakitKelainanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Polio'],
            ['nama' => 'Muntaber'],
            ['nama' => 'Kulit Bersisik'],
            ['nama' => 'Kolera'],
            ['nama' => 'Kelaparan'],
            ['nama' => 'Kelainan mental'],
            ['nama' => 'Kelainan fisik'],
            ['nama' => 'Flu Burung'],
            ['nama' => 'Demam Berdarah'],
            ['nama' => 'Cikungunya'],
        ];
        SakitKelainan::insert($data);
    }
}
