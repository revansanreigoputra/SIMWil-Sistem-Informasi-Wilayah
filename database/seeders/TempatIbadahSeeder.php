<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\TempatIbadah;

class TempatIbadahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Jumlah Wihara'],
            ['nama' => 'Jumlah Gereja'],
            ['nama' => 'Jumlah Masjid'],
            ['nama' => 'Jumlah Kelenteng'],
            ['nama' => 'Jumlah Pura'],
        ];

       TempatIbadah::insert($data);
    }
}
