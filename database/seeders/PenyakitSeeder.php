<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\Penyakit;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'TBC'],
            ['nama' => 'Stroke'],
            ['nama' => 'Paru-paru'],
            ['nama' => 'Malaria'],
            ['nama' => 'Lever'],
            ['nama' => 'Lepra/Kusta'],
            ['nama' => 'Kanker'],
            ['nama' => 'Jantung'],
            ['nama' => 'HIV/AIDS'],
            ['nama' => 'Ginjal'],
        ];
        Penyakit::insert($data);
    }
}
