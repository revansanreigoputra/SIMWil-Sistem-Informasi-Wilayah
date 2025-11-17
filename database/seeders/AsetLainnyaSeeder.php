<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\AsetLainnya;

class AsetLainnyaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Pelanggan Telkom'],
            ['nama' => 'Memiliki/menyewa pesawat terbang pribadi'],
            ['nama' => 'Memiliki/menyewa helikopter pribadi'],
            ['nama' => 'Memiliki Usaha Wartel'],
            ['nama' => 'Memiliki usaha transportasi/pengangkutan'],
            ['nama' => 'Memiliki usaha peternakan'],
            ['nama' => 'Memiliki usaha perkebunan'],
            ['nama' => 'Memiliki usaha perikanan'],
            ['nama' => 'Memiliki usaha pasar swalayan'],
            ['nama' => 'Memiliki usaha di pasar swalayan'],
            ['nama' => 'lainnya'],
        ];

        AsetLainnya::insert($data);
    }
}
