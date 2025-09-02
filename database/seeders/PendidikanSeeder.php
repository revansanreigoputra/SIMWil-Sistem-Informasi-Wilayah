<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\MasterDDK\Pendidikan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['pendidikan' => 'Belum masuk TK/Kelompok Bermain '],
            ['pendidikan' => 'Sedang TK/Kelompok Bermain'],
            ['pendidikan' => 'Sedang SD/sederajat '],
            ['pendidikan' => 'Sedang SLTP/Sederajat '],
            ['pendidikan' => 'Sedang SLTA/sederajat '],
            ['pendidikan' => 'Sedang D-1/sederajat '],
            ['pendidikan' => 'Sedang D-2/sederajat '],
            ['pendidikan' => 'Sedang D-3/sederajat '],
            ['pendidikan' => 'Sedang S-1/sederajat '],
            ['pendidikan' => 'Sedang S-2/sederajat'],
            ['pendidikan' => 'Sedang S-3/sederajat '],
            ['pendidikan' => 'Tamat SD/sederajat'],
            ['pendidikan' => 'Tamat SLTP/sederajat '],
            ['pendidikan' => 'Tamat SLTA/sederajat '],
            ['pendidikan' => 'Tamat D-1/sederajat'],
            ['pendidikan' => 'Tamat D-2/sederajat '],
            ['pendidikan' => 'Tamat D-3/sederajat '],
            ['pendidikan' => 'Tamat D-4/sederajat '],
            ['pendidikan' => 'Tamat S-1/sederajat '],
            ['pendidikan' => 'Tamat S-2/sederajat'],
            ['pendidikan' => 'Tamat S-3/sederajat '],
            ['pendidikan' => 'Sedang SLB A/sederajat '],
            ['pendidikan' => 'Sedang SLB B/sederajat '],
            ['pendidikan' => 'Sedang SLB C/sederajat '],
            ['pendidikan' => 'Tamat SLB A/sederajat '],
            ['pendidikan' => 'Tamat SLB B/sederajat '],
            ['pendidikan' => 'Tamat SLB C/sederajat '],
            ['pendidikan' => 'Tidak pernah sekolah '],
            ['pendidikan' => 'Tidak dapat membaca dan menulis huruf Latin/Arab '],
            ['pendidikan' => 'Tidak tamat SD/sederajat '],
        ];

        DB::table('pendidikans')->insert($data);
    }
}
