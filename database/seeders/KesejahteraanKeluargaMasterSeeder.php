<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPerkembangan\KesejahteraanKeluargaMaster;

class KesejahteraanKeluargaMasterSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Tinggal di kawasan rawan tanah longsor'],
            ['nama' => 'Tinggal di kawasan rawan kebakaran'],
            ['nama' => 'Tinggal di kawasan kumuh dan padat pemukiman'],
            ['nama' => 'Tinggal di kawasan jalur sutet'],
            ['nama' => 'Tinggal di kawasan jalur rel kereta api'],
            ['nama' => 'Tinggal di jalur rawan gempa bumi'],
            ['nama' => 'Tinggal di jalur hijau'],
            ['nama' => 'Tinggal di desa/kelurahan rawan kelaparan'],
            ['nama' => 'Tinggal di desa/kelurahan rawan gunung meletus'],
            ['nama' => 'Tinggal di desa/kelurahan rawan gagal tanam/panen'],
        ];

        KesejahteraanKeluargaMaster::insert($data);
    }
}