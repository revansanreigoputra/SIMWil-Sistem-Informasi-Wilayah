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
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Berlangganan koran/majalah'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki buku surat berharga'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki buku tabungan bank'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki hiasan emas/berlian'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki HP CDMA'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki HP GSM'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki kapal barang'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki kapal penumpang'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki kapal pesiar'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki mobil pribadi dan sejenisnya'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki parabola'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki perahu bermotor'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki perusahaan industri besar'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki perusahaan industri kecil'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki perusahaan industri menengah'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki saham di perusahaan'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki sepeda motor pribadi'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki sertifikat bangunan'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki sertifikat deposito'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki sertifikat tanah'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki ternak besar'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki ternak kecil'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki TV dan elektronik sejenis lainnya'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki usaha di pasar desa'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki usaha di pasar swalayan'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki usaha pasar swalayan'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki usaha perikanan'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki usaha perkebunan'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki usaha peternakan'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki usaha transportasi/pengangkutan'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki Usaha Wartel'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki/menyewa helikopter pribadi'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Memiliki/menyewa pesawat terbang pribadi'],
            ['nama_jenis_aset' => 'Jumlah Keluarga Yang Pelanggan Telkom'],
        ];

        DB::table('jenis_aset_lainnyas')->insert($data);
    }
}
