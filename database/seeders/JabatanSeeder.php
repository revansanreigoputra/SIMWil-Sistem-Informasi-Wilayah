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
        ]);
        Jabatan::create([
            'nama_jabatan' => 'Sekretaris Desa',
        ]);
        Jabatan::create([
            'nama_jabatan' => 'Kepala Dusun',
        ]);
        Jabatan::create([
            'nama_jabatan' => 'Kepala BPD',
        ]);
        Jabatan::create([
            'nama_jabatan' => 'Anggota BPD',
        ]);
    }
}