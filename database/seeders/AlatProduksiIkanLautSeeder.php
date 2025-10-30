<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\AlatProduksiIkanLaut;

class AlatProduksiIkanLautSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Pancing (Unit)'],
            ['nama' => 'Jala (Unit)'],
        ];

       AlatProduksiIkanLaut::insert($data);
    }
}
