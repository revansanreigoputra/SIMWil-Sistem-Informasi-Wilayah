<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\TempatPerawatan;

class TempatPerawatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Puskesmas'],
            ['nama' => 'Rumas Sakit'],
            ['nama' => 'Rumas'],
        ];
        TempatPerawatan::insert($data);
    }
}
