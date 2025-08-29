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
            'kepala_desa_id' => 1, // sesuai ID dari KepalaDesaSeeder
            'email' => 'desa@sukamaju.id',
            'telepon' => '0219876543',
            'website' => 'https://sukamaju.desa.id',
            'logo' => null,
            'latitude' => -6.20000000,
            'longitude' => 106.81666667,
        ]);
    }
}
