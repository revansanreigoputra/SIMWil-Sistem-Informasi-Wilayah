<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\KomoditasTernak;

class KomoditasTernakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Ular Pithon'],
            ['nama' => 'Ular Cobra'],
            ['nama' => 'Tuna'],
            ['nama' => 'Sapi'],
            ['nama' => 'Kuda'],
            ['nama' => 'Kucing'],
            ['nama' => 'Kerbau'],
            ['nama' => 'Kelinci'],
            ['nama' => 'Kambing'],
            ['nama' => 'Jenis Ayam Broiler'],
        ];
         KomoditasTernak::insert($data);
    }
}
