<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisAsetLainnyaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Jumlah Keluarga Yang Berlangganan koran/majalah'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki buku surat berharga'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki buku tabungan bank'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki hiasan emas/berlian'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki HP CDMA'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki HP GSM'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki kapal barang'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki kapal penumpang'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki kapal pesiar'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki mobil pribadi dan sejenisnya'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki parabola'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki perahu bermotor'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki perusahaan industri besar'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki perusahaan industri kecil'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki perusahaan industri menengah'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki saham di perusahaan'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki sepeda motor pribadi'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki sertifikat bangunan'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki sertifikat deposito'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki sertifikat tanah'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki ternak besar'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki ternak kecil'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki TV dan elektronik sejenis lainnya'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki usaha di pasar desa'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki usaha di pasar swalayan'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki usaha pasar swalayan'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki usaha perikanan'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki usaha perkebunan'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki usaha peternakan'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki usaha transportasi/pengangkutan'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki Usaha Wartel'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki/menyewa helikopter pribadi'],
            ['nama' => 'Jumlah Keluarga Yang Memiliki/menyewa pesawat terbang pribadi'],
            ['nama' => 'Jumlah Keluarga Yang Pelanggan Telkom'],
        ];

        DB::table('jenis_aset_lainnyas')->insert($data);
    }
}
