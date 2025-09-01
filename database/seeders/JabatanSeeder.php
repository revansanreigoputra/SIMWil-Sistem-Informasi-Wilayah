<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jabatan::create([
            'nama_jabatan' => 'Kepala Desa',
            'desa_id' => 1,
            'kecamatan_id' => 1,
        ]);
        Jabatan::create([
            'nama_jabatan' => 'Sekretaris Desa',
            'desa_id' => 1,
            'kecamatan_id' => 1,
        ]);
        Jabatan::create([
            'nama_jabatan' => 'Kepala Dusun',
            'desa_id' => 2,
            'kecamatan_id' => 2,
        ]);
    }
}
