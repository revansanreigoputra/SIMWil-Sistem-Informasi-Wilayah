<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\KategoriSekolah;

class KategoriSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data = [
            ['nama' => 'Sekolah Negeri'],
            ['nama' => 'Sekolah Islam'],
        ];

        KategoriSekolah::insert($data);
    }
}
