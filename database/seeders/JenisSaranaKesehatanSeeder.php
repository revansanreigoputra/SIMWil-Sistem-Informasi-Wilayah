<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\JenisSaranaKesehatan;

class JenisSaranaKesehatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        $data = [
            ['nama' => 'Jumlah Dokter Gigi'],
            ['nama' => 'Bidan'],
        ];

       JenisSaranaKesehatan::insert($data);
    }
}
