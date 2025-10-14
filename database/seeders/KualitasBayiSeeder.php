<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\KualitasBayi;

class KualitasBayiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Keguguran kandungan'],
            ['nama' => 'Bayi lahir mati'],
            ['nama' => 'Bayi lahir hidup normal'],
            ['nama' => 'Bayi lahir hidup cacat'],
            ['nama' => 'Bayi lahir berat lebih dari 4 kg'],
            ['nama' => 'Bayi lahir berat kurang dari 2,5 kg'],
            ['nama' => 'Bayi 0-5 tahun hidup yang menderita kelainan organ tubuh, fisik dan mental'],
        ];
         KualitasBayi::insert($data);
    }
}
