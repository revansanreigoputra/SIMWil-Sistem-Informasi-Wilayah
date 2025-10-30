<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use App\Models\MasterDDK\MataPencaharian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MataPencaharianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
 
        DB::table('mata_pencaharians')->truncate();
 
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = [
            ['mata_pencaharian' => 'Belum Bekerja', 'keterangan' => ''],
            ['mata_pencaharian' => 'Pelajar/Mahasiswa', 'keterangan' => ''],
            ['mata_pencaharian' => 'Ibu Rumah Tangga', 'keterangan' => ''],
            ['mata_pencaharian' => 'Petani', 'keterangan' => ''],
            ['mata_pencaharian' => 'Nelayan', 'keterangan' => ''],
            ['mata_pencaharian' => 'Buruh', 'keterangan' => ''],
            ['mata_pencaharian' => 'Pedagang', 'keterangan' => ''],
            ['mata_pencaharian' => 'Pegawai Negeri Sipil (PNS)', 'keterangan' => ''],
            ['mata_pencaharian' => 'TNI/POLRI', 'keterangan' => ''],
            ['mata_pencaharian' => 'Karyawan Swasta', 'keterangan' => ''],
            ['mata_pencaharian' => 'Wiraswasta', 'keterangan' => ''],
            ['mata_pencaharian' => 'Guru/Dosen', 'keterangan' => 'jasa'],
            ['mata_pencaharian' => 'Tenaga Kesehatan', 'keterangan' => 'jasa'],
            ['mata_pencaharian' => 'Seniman/Artis', 'keterangan' => 'jasa'],
            ['mata_pencaharian' => 'Pemuka Agama', 'keterangan' => ''],
            ['mata_pencaharian' => 'Konsultan/Profesional', 'keterangan' => 'jasa'],
            ['mata_pencaharian' => 'Pensiunan', 'keterangan' => ''],
            ['mata_pencaharian' => 'Tidak Memiliki Pekerjaan Tetap', 'keterangan' => ''],


        ];

        DB::table('mata_pencaharians')->insert($data);
    }
}
