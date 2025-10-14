<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\Kejahatan;

class KejahatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Korban perkosaan/pelecehan seksual yang pelakunya bukan anggota keluarga'],
            ['nama' => 'Korban perkosaan/pelecehan seksual yang pelakunya anggota keluarga'],
            ['nama' => 'Korban kehamilan yang tidak/belum disahkan secara hukum agama dan hukum negara'],
            ['nama' => 'Korban kehamilan yang tidak dinikahi pelaku'],
            ['nama' => 'Korban kehamilan di luar nikah yang sah menurut hukum adat'],
        ];

        Kejahatan::insert($data);
    }
}
