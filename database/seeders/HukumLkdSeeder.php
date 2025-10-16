<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\HukumLkd;

class HukumLkdSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Belum diatur'],
            ['nama' => 'Keputusan Camat'],
            ['nama' => 'Keputusan Kepala Desa'],
            ['nama' => 'Peraturan Desa'],
        ];

        HukumLkd::insert($data);
    }
}
