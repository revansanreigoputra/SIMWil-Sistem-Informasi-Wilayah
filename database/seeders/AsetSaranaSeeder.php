<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsetSaranaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('aset_sarana')->insert([
            ['nama' => 'Memiliki Helikopter atau Pesawat'],
            ['nama' => 'Memiliki tongkang'],
            ['nama' => 'Memiliki sepeda dayung'],
            ['nama' => 'Memiliki perahu tidak bermotor'],
            ['nama' => 'Memiliki ojek motor/sepeda motor/bentor'],
            ['nama' => 'Memiliki bus penumpang/angkutan orang/barang'],
            ['nama' => 'Memiliki becak'],
            ['nama' => 'Memiliki bajaj/kancil'],
            ['nama' => 'Memiiki cidemo/andong/dokar'],
        ]);
    }
}
