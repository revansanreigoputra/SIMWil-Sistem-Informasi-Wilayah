<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\KualitasIbu;

class KualitasIbuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Kematian ibu saat melahirkan'],
            ['nama' => 'Ibu nifas sehat'],
            ['nama' => 'Ibu nifas sakit'],
            ['nama' => 'Ibu hamil yang meninggal'],
            ['nama' => 'Ibu hamil tidak periksa kesehatan'],
            ['nama' => 'Ibu hamil periksa di Rumah Sakit'],
            ['nama' => 'Ibu hamil periksa di Puskesmas'],
            ['nama' => 'Ibu hamil periksa di Posyandu'],
            ['nama' => 'Ibu hamil periksa di Dukun Terlatih'],
        ];
         KualitasIbu::insert($data);
    }
}
