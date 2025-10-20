<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KopTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Use the exact strings that are defined in the ENUM property
        $templates = [
            [
                'jenis_kop' => 'kop surat',   // EXACT ENUM VALUE 1
                'nama' => 'PEMERINTAH PROVINSI JAWA BARAT',
                'logo' => null, 
            ],
            [
                'jenis_kop' => 'kop laporan', // EXACT ENUM VALUE 2
                'nama' => 'PEMERINTAH PROVINSI JAWA BARAT',
                'logo' => null, 
            ],
        ];

        foreach ($templates as $template) {
            DB::table('kop_templates')->updateOrInsert(
                // Use a unique key for lookup/update
                ['jenis_kop' => $template['jenis_kop']], 
                $template
            );
        }
    }
}