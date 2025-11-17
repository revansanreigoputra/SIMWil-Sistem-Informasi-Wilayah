<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PotensiKelembagaan\PemilikOrganisasi;

class PemilikOrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Pemerintah'],
            ['nama' => 'Swasta'],
            ['nama' => 'Perorangan'],
        ];
        PemilikOrganisasi::insert($data);
    }
}
