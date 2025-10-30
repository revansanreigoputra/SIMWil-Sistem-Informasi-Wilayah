<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HidupBersihSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hidup_bersih')->insert([
            ['nama' => 'Menggunakan fasilitas MCK umum'],
            ['nama' => 'Memiliki WC yang permanen/semipermanen'],
            ['nama' => 'Memiliki WC yang darurat/kurang memenuhi standar kesehatan'],
            ['nama' => 'Biasa buang air besar di sungai/parit/kebun/hutan'],
        ]);
    }
}
