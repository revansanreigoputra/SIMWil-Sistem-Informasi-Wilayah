<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\Pencurian;

class PencurianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data = [
            ['nama' => 'Korban pencurian, perampokan dalam keluarga'],
        ];
         Pencurian::insert($data);
    }
}
