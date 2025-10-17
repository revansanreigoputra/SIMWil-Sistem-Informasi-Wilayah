<?php

namespace Database\Seeders;

use App\Models\JpHiburan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JpHiburanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JpHiburan::create(['nama' => 'Diskotik']);
        JpHiburan::create(['nama' => 'Billiard']);
        JpHiburan::create(['nama' => 'Hotel']);
    }
}