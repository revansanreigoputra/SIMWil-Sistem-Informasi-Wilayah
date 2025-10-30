<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jpgedung;

class JpgedungSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Gedung Kampus PTN'],
            ['nama' => 'Gedung Kampus PTS'],
        ];

        Jpgedung::insert($data);
    }
}