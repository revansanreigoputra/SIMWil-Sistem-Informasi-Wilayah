<?php

namespace Database\Seeders;
use Illuminate\support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KedudukanPajakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kedudukan_pajak' => 'Wajib Pajak Badan/Perusahaan'],
            ['kedudukan_pajak' => 'Wajib Pajak Bumi dan Bangunan'],
            ['kedudukan_pajak' => 'Wajib Pajak Kendaraan Bermotor'],
            ['kedudukan_pajak' => 'Wajib Pajak Penghasilan Perorangan'],
            ['kedudukan_pajak' => 'Wajib Retribusi Keamanan'],
            ['kedudukan_pajak' => 'Wajib Retribusi Kebersihan'],
        ];

        DB::table('kedudukan_pajaks')->insert($data);
    }
}
