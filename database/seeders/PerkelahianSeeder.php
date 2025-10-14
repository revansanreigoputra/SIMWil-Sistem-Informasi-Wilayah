<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\Perkelahian;

class PerkelahianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Korban luka parah akibat perkelahian dalam keluarga'],
            ['nama' => 'Korban jiwa akibat perkelahian dalam keluarga'],
        ];
        Perkelahian::insert($data);
    }
}
