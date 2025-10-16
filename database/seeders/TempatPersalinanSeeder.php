<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\TempatPersalinan;

class TempatPersalinanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Persalinan ditolong perawat'],
            ['nama' => 'Persalinan ditolong keluarga'],
            ['nama' => 'Persalinan ditolong dukun bersalin'],
            ['nama' => 'Persalinan ditolong Dokter'],
            ['nama' => 'Persalinan ditolong bidan'],
        ];
        TempatPersalinan::insert($data);
    }
}
