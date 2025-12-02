<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\Pencemaran;

class PencemaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pencemaranJenis = [
            ['nama' => 'Industri'],
            ['nama' => 'Kendaraan Bermotor'],
            ['nama' => 'Pembakaran Hutan'],
            ['nama' => 'Sampah Domestik'],
            ['nama' => 'Pertambangan'],
        ];

        foreach ($pencemaranJenis as $pencemaran) {
            Pencemaran::create($pencemaran);
        }
    }
}
