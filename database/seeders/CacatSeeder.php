<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CacatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cacats = [
            // Kategori Cacat Fisik
            [
                'tipe' => 'fisik',
                'nama_cacat' => 'Tuna Daksa (Disabilitas Anggota Gerak)'
            ],
            [
                'tipe' => 'fisik',
                'nama_cacat' => 'Tuna Netra (Disabilitas Penglihatan)'
            ],
            [
                'tipe' => 'fisik',
                'nama_cacat' => 'Tuna Rungu/Wicara (Disabilitas Pendengaran/Wicara)'
            ],
            [
                'tipe' => 'fisik',
                'nama_cacat' => 'Tuna Ganda (Kombinasi Disabilitas Fisik dan Mental)'
            ],
            [
                'tipe' => 'fisik',
                'nama_cacat' => 'Penyandang Disabilitas Bawaan Lahir'
            ],
            [
                'tipe' => 'fisik',
                'nama_cacat' => 'Penyandang Disabilitas Akibat Penyakit Kronis'
            ],

            // Kategori Cacat Mental
            [
                'tipe' => 'mental',
                'nama_cacat' => 'Tuna Grahita (Disabilitas Intelektual)'
            ],
            [
                'tipe' => 'mental',
                'nama_cacat' => 'Tuna Laras (Disabilitas Mental dan Perilaku)'
            ],
            [
                'tipe' => 'mental',
                'nama_cacat' => 'Disabilitas Ganda (Kombinasi Disabilitas Intelektual dan Fisik)'
            ],
            [
                'tipe' => 'mental',
                'nama_cacat' => 'Autisme'
            ],
            [
                'tipe' => 'mental',
                'nama_cacat' => 'Down Syndrome'
            ],
            [
                'tipe' => 'mental',
                'nama_cacat' => 'Skizofrenia'
            ],
            // caccat sosial
            [
                'tipe' => 'sosial',
                'nama_cacat' => 'Gangguan Komunikasi'
            ],
            [
                'tipe' => 'sosial',
                'nama_cacat' => 'Gangguan Interaksi Sosial'
            ],
            [
                'tipe' => 'sosial',
                'nama_cacat' => 'Disabilitas Ganda (Kombinasi Disabilitas Fisik/Mental/Sosial)'
            ],
        ];
 
        DB::table('cacats')->insert($cacats);
    }
}
