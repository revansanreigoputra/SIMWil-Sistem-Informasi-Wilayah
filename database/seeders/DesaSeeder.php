<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Desa;
use Illuminate\Database\Seeder;

final class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Desa::create([
            'kode_desa' => 'DS001',
            'nama_desa' => 'Desa Sukamaju',
            'alamat_kantor' => 'Jl. Raya Sukamaju No. 5',
            'kepala_desa_id' => 1,
            'email' => 'desa@sukamaju.id',
            'telepon' => '0219876543',
            'website' => 'https://sukamaju.desa.id',
            'logo' => null,
            'latitude' => -6.20000000,
            'longitude' => 106.81666667,
        ]);

        Desa::create([
            'kode_desa' => 'DS002',
            'nama_desa' => 'Desa Mulyajaya',
            'alamat_kantor' => 'Jl. Mulyajaya No. 10',
            'kepala_desa_id' => 1, // atau ganti sesuai id kepala desa lain jika ada
            'email' => 'desa@mulyajaya.id',
            'telepon' => '0211234567',
            'website' => 'https://mulyajaya.desa.id',
            'logo' => null,
            'latitude' => -6.21000000,
            'longitude' => 106.82666667,
        ]);
    }
}
