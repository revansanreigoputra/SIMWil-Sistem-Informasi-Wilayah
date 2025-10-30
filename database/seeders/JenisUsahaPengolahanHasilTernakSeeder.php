<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\JenisUsahaPengolahanHasilTernak;

class JenisUsahaPengolahanHasilTernakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Telur Asin'],
            ['nama' => 'Madu Lebah'],
            ['nama' => 'Dendeng'],
            ['nama' => 'Biogas'],
            ['nama' => 'Abon'],
        ];

        JenisUsahaPengolahanHasilTernak::insert($data);
    }
}
