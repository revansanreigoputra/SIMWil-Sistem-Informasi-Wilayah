<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisProduksiTernak;

class JenisProduksiTernakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisProduksiTernaks = [
            ['nama' => 'Bulu'],
            ['nama' => 'Burung Walet'],
        ];

        foreach ($jenisProduksiTernaks as $jenis) {
            JenisProduksiTernak::create($jenis);
        }
    }
}
