<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\KomoditasPangan;

class KomoditasPanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data = [
            ['nama' => 'Bawang Putih'],
            ['nama' => 'Bawang Merah'],
        ];
         KomoditasPangan::insert($data);
    }
}
