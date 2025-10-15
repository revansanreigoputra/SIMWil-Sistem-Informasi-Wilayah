<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\PenentuanAnggotaBpd;

class PenentuanAnggotaBpdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data = [
            ['nama' => 'Disahkan melalui keputusan Bupati/Walikota'],
            ['nama' => 'Ditunjuk oleh Kepala Desa/Camat dan unsur lainnya'],
            ['nama' => 'Dipilih oleh perwakilan masyarakat desa secara musyawarah dan mufakat'],
            ['nama' => 'Dipilih masyarakat secara langsung'],
        ];
         PenentuanAnggotaBpd::insert($data);
    }
}
