<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\JenisDampak;

class JenisDampakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Pencemaran Udara'],
            ['nama' => 'Pencemaran Air'],
            ['nama' => 'Terjadinya Lahan Kritis'],
            ['nama' => 'Kebakaran Hutan'],
            ['nama' => 'Berubahnya Fungsi Hutan'],
        ];

        JenisDampak::insert($data);
    }
}
