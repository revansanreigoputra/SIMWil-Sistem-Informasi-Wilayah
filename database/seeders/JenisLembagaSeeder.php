<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisLembagaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('jenis_lembaga')->truncate();
        
        DB::table('jenis_lembaga')->insert([
            ['nama' => 'Karang Taruna'],
            ['nama' => 'Badan Usaha Milik Desa'],
        ]);
    }
}