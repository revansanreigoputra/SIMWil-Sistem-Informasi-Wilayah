<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisPenyakitSeeder extends Seeder {
    public function run(): void {
        $data = [
            ['nama' => 'Asma'],
            ['nama' => 'Diabetes Melitus'],
            ['nama' => 'Gila/stress'],
            ['nama' => 'Ginjal'],
            ['nama' => 'HIV/AIDS'],
            ['nama' => 'Jantung'],
            ['nama' => 'Kanker'],
            ['nama' => 'Lepra/Kusta'],
            ['nama' => 'Lever'],
            ['nama' => 'Malaria'],
            ['nama' => 'Paru-paru'],
            ['nama' => 'Stroke'],
            ['nama' => 'TBC'],
        ];

        DB::table('jenis_penyakits')->insert($data);
    }
}
