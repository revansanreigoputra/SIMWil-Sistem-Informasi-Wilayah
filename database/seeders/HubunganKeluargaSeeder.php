<?php

namespace Database\Seeders;
use App\Models\MasterDDK\HubunganKeluarga;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HubunganKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Adik'],
            ['nama' => 'Cucu'],
            ['nama' => 'Kakek'],
            ['nama' => 'Mertua'],
            ['nama' => 'Tante'],
            ['nama' => 'Anak Angkat'],
            ['nama' => 'Famili Lain'],
            ['nama' => 'Kepala Keluarga'],
            ['nama' => 'Nenek'],
            ['nama' => 'Teman'],
            ['nama' => 'Anak Kandung'],
            ['nama' => 'Ibu'],
            ['nama' => 'Keponakan'],
            ['nama' => 'Paman'],
            ['nama' => 'Anak Tiri'],
            ['nama' => 'Istri'],
            ['nama' => 'Lainnya'],
            ['nama' => 'Sepupu'],
            ['nama' => 'Ayah'],
            ['nama' => 'Kakak'],
            ['nama' => 'Menantu'],
            ['nama' => 'Suami'],
        ];

        DB::table('hubungan_keluarga')->insert($data);
    }
}
