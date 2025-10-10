<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jskesehatan;

class JskesehatanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Bidan'],
            ['nama' => 'Dokter Gigi'],
        ];

        Jskesehatan::insert($data);
    }
}