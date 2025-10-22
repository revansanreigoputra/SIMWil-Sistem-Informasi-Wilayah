<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\Penculikan;

class PenculikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Korban penculikan yang pelakunya bukan anggota keluarga'],
            ['nama' => 'Korban penculikan yang pelakunya anggota keluarga'],
        ];
         Penculikan::insert($data);
    }
}
