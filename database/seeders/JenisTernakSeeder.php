<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\JenisTernak;

class JenisTernakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Ayam'],
            ['nama' => 'Kuda'],
            ['nama' => 'Sapi'],
            ['nama' => 'Kambing'],
            ['nama' => 'Kerbau'],
        ];

        JenisTernak::insert($data);
    }
}
