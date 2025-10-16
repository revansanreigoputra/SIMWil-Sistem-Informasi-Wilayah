<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\Pembunuhan;

class PembunuhanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Korban pembunuhan dalam keluarga yang pelakunya bukan anggota keluarga'],
            ['nama' => 'Korban pembunuhan dalam keluarga yang pelakunya anggota keluarga'],
        ];
         Pembunuhan::insert($data);
    }
}
