<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\DasarHukum;

class DasarHukumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Berdasarkan Perdes'],
            ['nama' => 'Keputusan Camat'],
        ];

       DasarHukum::insert($data);
    }
}
