<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\AlatProduksiIkanTawar;

class AlatProduksiIkanTawarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Pancing'],
            ['nama' => 'Danau'],
        ];

       AlatProduksiIkanTawar::insert($data);
    }
}
