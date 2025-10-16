<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\Kerukunan;

class KerukunanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Korban meninggal dalam keluarga akibat konflik Sara'],
            ['nama' => 'Korban luka dalam keluarga akibat konflik Sara'],
            ['nama' => 'Janda/duda dalam keluarga akibat konflik Sara'],
            ['nama' => 'Anak yatim/piatu dalam keluarga akibat konflik Sara'],
        ];

        Kerukunan::insert($data);
    }
}
