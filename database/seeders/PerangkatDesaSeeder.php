<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\KepalaDesa;
use App\Models\PerangkatDesa;
use Illuminate\Database\Seeder;

final class PerangkatDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PerangkatDesa::create([
            'nama' => 'Budi Santoso',
            'tanggal_lahir' => '1970-05-12',
            'jenis_kelamin' => 'L',
            'golongan_darah' => 'O',
            'jabatan_id' => 1,
            'desa_id' => 1,
            'kontak' => '081234567890',
            'alamat' => 'Jl. Merdeka No. 1, Desa Sukamaju',
            'masa_jabatan' => '2020-2026',
            'nama_istri' => 'Siti Aminah',
            'jumlah_anak' => 3,
            'sambutan' => 'Selamat datang di website resmi Desa Sukamaju.',
            'foto' => null,
        ]);
    }
}
