<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\PenentuanKetuaBpd;

class PenentuanKetuaBpdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Dipilih oleh rakyat secara langsung dari para anggota BPD'],
            ['nama' => 'Ditunjuk Camat'],
            ['nama' => 'Dipilih oleh Kepala Desa dan setujui Camat'],
            ['nama' => 'Dipilih dari dan oleh anggota BPD secara langsung'],
        ];
         PenentuanKetuaBpd::insert($data);
    }
}
