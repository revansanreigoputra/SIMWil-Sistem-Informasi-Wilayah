<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\PolaMakan;

class PolaMakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Kebiasaan makan sehari lebih dari 3 kali'],
            ['nama' => 'Kebiasaan makan sehari 3 kali'],
            ['nama' => 'Kebiasaan makan sehari 2 kali'],
            ['nama' => 'Kebiasaan makan dalam sehari 1 kali'],
            ['nama' => 'Belum tentu sehari makan 1 kali'],
        ];
        PolaMakan::insert($data);
    }
}
