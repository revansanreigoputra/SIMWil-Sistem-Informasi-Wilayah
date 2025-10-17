<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jpkesehatan;

class JpkesehatanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Apotik'],
            ['nama' => 'Puskesmas'],
        ];

        Jpkesehatan::insert($data);
    }
}