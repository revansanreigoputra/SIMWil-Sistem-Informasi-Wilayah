<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\JenisPrasaranaKesehatan;

class JenisPrasaranaKesehatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Puskesmas'],
            ['nama' => 'Apotik'],
        ];

       JenisPrasaranaKesehatan::insert($data);
    }
}
