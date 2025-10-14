<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\KomoditasIndustri;


class KomoditasIndustriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data = [
            ['nama' => 'BambuSubsektor Industri Pangan'],
            ['nama' => 'Subsektor Industri Pakaian'],
            ['nama' => 'Industri Pengolahan Non Migas'],
            ['nama' => 'Industri Pengolahan Migas'],
        ];
         KomoditasIndustri::insert($data);
    }
}
