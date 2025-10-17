<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\NamaIkan;

class NamaIkanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Teri'],
            ['nama' => 'Tongkol'],
        ];

        NamaIkan::insert($data);
    }
}
