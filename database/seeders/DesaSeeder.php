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
            'kecamatan_id' => 1,
            'nama_desa' => 'Desa Sukamaju',
            'status' => 'desa',
            'kelurahan_terluar' => null,
            'tipologi' => 'Perdesaan',
            'luas' => 1200,
            'bujur' => '-6.20000000',
            'lintang' => '106.81666667',
            'ketinggian' => 50,
            'kode_pum' => 'DS001',
        ]);
        Desa::create([
            'kecamatan_id' => 2,
            'nama_desa' => 'Desa Mulyajaya',
            'status' => 'desa',
            'kelurahan_terluar' => null,
            'tipologi' => 'Perdesaan',
            'luas' => 900,
            'bujur' => '-6.21000000',
            'lintang' => '106.82666667',
            'ketinggian' => 60,
            'kode_pum' => 'DS002',
        ]);
    }
}
