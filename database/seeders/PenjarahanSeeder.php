<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\Penjarahan;

class PenjarahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Korban penjarahan yang pelakunya bukan anggota keluarga'],
            ['nama' => 'Korban penjarahan yang pelakunya anggota keluarga'],
        ];
        Penjarahan::insert($data);
    }
}
