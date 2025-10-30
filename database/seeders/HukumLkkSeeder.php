<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\HukumLkk;

class HukumLkkSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Belum diatur'],
            ['nama' => 'Keputusan Camat'],
            ['nama' => 'Keputusan Lurah'],
        ];

        HukumLkk::insert($data);
    }
}
