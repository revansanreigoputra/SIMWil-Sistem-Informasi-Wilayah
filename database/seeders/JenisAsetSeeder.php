<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisAsetSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jenis_asets')->insert([
            ['nama_aset' => 'Memiliki cidemo/andong/dokar'],
            ['nama_aset' => 'Memiliki bajaj/kancil'],
            ['nama_aset' => 'Memiliki becak'],
            ['nama_aset' => 'Memiliki bus penumpang/angkutan orang/barang'],
            ['nama_aset' => 'Memiliki ojek motor/sepeda motor/bentor'],
            ['nama_aset' => 'Memiliki perahu tidak bermotor'],
            ['nama_aset' => 'Memiliki sepeda dayung'],
            ['nama_aset' => 'Memiliki tongkang'],
            ['nama_aset' => 'Memiliki Helikopter atau Pesawat'],
        ]);
    }
}
