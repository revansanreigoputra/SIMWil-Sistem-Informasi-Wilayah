<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\KomoditasGalian;

class KomoditasGalianSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Tembaga'],
            ['nama' => 'Alumunium'],
        ];

        KomoditasGalian::insert($data);
    }
}
