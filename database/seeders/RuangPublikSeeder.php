<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\RuangPublik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class RuangPublikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ruangPublikJenis = [
            ['nama' => 'Hutan Kota'],
            ['nama' => 'Taman Bermain'],
            ['nama' => 'Taman Desa/Kelurahan'],
            ['nama' => 'Taman Kota'],
            ['nama' => 'Hutan Adat'],
            ['nama' => 'Balai Desa'],
            ['nama' => 'Puskesmas'],
            ['nama' => 'Lapangan Olahraga'],
            ['nama' => 'Pasar Tradisional'],
            ['nama' => 'Tanah Kas Desa'],
        ];

        foreach ($ruangPublikJenis as $ruangPublik) {
            RuangPublik::create($ruangPublik);
        }
    }
}
