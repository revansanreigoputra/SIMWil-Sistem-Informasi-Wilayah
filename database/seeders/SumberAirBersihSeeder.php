<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPotensi\SumberAirBersih;

class SumberAirBersihSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Sungai'],
            ['nama' => 'PAM'],
            ['nama' => 'Embun'],
            ['nama' => 'Beli Dari Tangki Swasta'],
            ['nama' => 'Bak Penampungan Air Hujan'],
        ];

        SumberAirBersih::insert($data);
    }
}
