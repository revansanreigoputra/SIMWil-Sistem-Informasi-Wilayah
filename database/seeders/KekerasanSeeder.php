<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\Kekerasan;

class KekerasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Adanya pertengkaran dalam keluarga antara ayah dan ibu/orang tua'],
            ['nama' => 'Adanya pertengkaran dalam keluarga antara anak dan pembantu'],
            ['nama' => 'Adanya pertengkaran dalam keluarga antara anak dan orang tua'],
            ['nama' => 'Adanya pertengkaran dalam keluarga antara anak dan anggota keluarga lain'],
            ['nama' => 'Adanya pertengkaran dalam keluarga antara anak dan anak'],
            ['nama' => 'Adanya pemukulan/tindakan fisik antara orang tua dengan pembantu'],
            ['nama' => 'Adanya pemukulan/tindakan fisik antara orang tua dengan orang tua'],
            ['nama' => 'Adanya pemukulan/tindakan fisik antara orang tua dengan anak'],
            ['nama' => 'Adanya pemukulan/tindakan fisik antara anak dengan pembantu'],
            ['nama' => 'Adanya pemukulan/tindakan fisik antara anak dengan orang tua'],
        ];

        Kekerasan::insert($data);
    }
}
