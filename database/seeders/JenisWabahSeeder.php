<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisWabahSeeder extends Seeder
{
    public function run(): void
    {
       $data = [
            ['nama' => 'Busung lapar'],
            ['nama' => 'Cikungunya'],
            ['nama' => 'Demam berdarah'],
            ['nama' => 'Flu burung'],
            ['nama' => 'Ispa'],
            ['nama' => 'Kelaparan'],
            ['nama' => 'Kolera'],
            ['nama' => 'Muntaber'],
            ['nama' => 'Polio'],
            // Tambahkan di sini:
            ['nama' => 'Covid-19'],
            ['nama' => 'Malaria'],
        ];


        DB::table('jenis_wabahs')->insert($data);
    }
}
