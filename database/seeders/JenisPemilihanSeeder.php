<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\JenisPemilihan;

class JenisPemilihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Pemilu Kepala Kecamatan'],
            ['nama' => 'Pemilu Kepala Desa'],
        ];

       JenisPemilihan::insert($data);
    }
}
