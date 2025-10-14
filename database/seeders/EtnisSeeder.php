<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtnisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('etnis')->insert([
            ['nama' => 'Jawa'],
            ['nama' => 'Tionghoa'],
        ]);
    }
}
