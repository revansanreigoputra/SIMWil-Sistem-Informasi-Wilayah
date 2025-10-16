<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\Perjudian;

class PerjudianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Anggota keluarga yang memiliki kebiasaan berjudi'],
        ];
        Perjudian::insert($data);
    }
}
