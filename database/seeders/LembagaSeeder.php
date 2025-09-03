<?php

namespace Database\Seeders;
use Illuminate\support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LembagaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Data untuk jenis_lembaga 'Pemerintahan'
            ['jenis_lembaga' => 'Pemerintahan', 'nama_lembaga' => 'Kementerian'],
            ['jenis_lembaga' => 'Pemerintahan', 'nama_lembaga' => 'DPRD'],
            ['jenis_lembaga' => 'Pemerintahan', 'nama_lembaga' => 'Pemerintah Provinsi'],
            ['jenis_lembaga' => 'Pemerintahan', 'nama_lembaga' => 'Pemerintah Kabupaten/Kota'],
            ['jenis_lembaga' => 'Pemerintahan', 'nama_lembaga' => 'Kantor Desa/Kelurahan'],

            // Data untuk jenis_lembaga 'Kemasyarakatan'
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Anggota Karang Taruna'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Anggota Lembaga Gotong royong'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Anggota LKMD/K/LPM'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Anggota Organisasi Bapak-bapak'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Anggota Organisasi keagamaan'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Anggota Organisasi Kelompok Tani/Nelayan'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Anggota organisasi pemirsa/pendengar'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Anggota organisasi pencinta alam'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Anggota organisasi pengembangan ilmu pengetaahuan'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Anggota organisasi pensiunan'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Anggota Organisasi Perempuan'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Anggota Organisasi Profesi guru'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Anggota Organisasi profesi wartawan'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Anggota Organisasi profesi/tenaga medis'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Anggota Pengurus RT'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Anggota Pengurus RW'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Anggota PKK'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Anggota Satgas Kebakaran'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Anggota Satgas Kebersihan'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Anggota Tim Penanggulangan Bencana'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Anggota yayasan'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pemilik yayasan'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus Hansip/Linmas'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus Karang Taruna'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus Lembaga Adat'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus Lembaga Gotong royong'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus lembaga pencinta alam'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus LKMD/K/LPM'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus Organisasi Bapak-bapak'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus Organisasi keagamaan'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus Organisasi Kelompok Tani/Nelayan'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus organisasi pemirsa/pendengar'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus organisasi pengembangan ilmu pengetahuan'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus organisasi pensiunan'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus Organisasi Perempuan'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus Organisasi profesi dokter/tenaga medis'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus Organisasi Profesi guru'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus Organisasi profesi wartawan'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus PKK'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus Poskamling'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus Posko Penanggulangan Bencana'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus Posyandu'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus Posyantekdes'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus RT'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus RW'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus Satgas Kebakaran'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus Satgas Kebersihan'],
            ['jenis_lembaga' => 'Kemasyarakatan', 'nama_lembaga' => 'Pengurus yayasan'],

            // Data untuk jenis_lembaga 'Ekonomi'
            ['jenis_lembaga' => 'Ekonomi', 'nama_lembaga' => 'Koperasi'],
            ['jenis_lembaga' => 'Ekonomi', 'nama_lembaga' => 'Perusahaan Swasta'],
            ['jenis_lembaga' => 'Ekonomi', 'nama_lembaga' => 'BUMN/BUMD'],
            ['jenis_lembaga' => 'Ekonomi', 'nama_lembaga' => 'UMKM'],
            ['jenis_lembaga' => 'Ekonomi', 'nama_lembaga' => 'Asosiasi Bisnis'],
        ];

        DB::table('lembagas')->insert($data);
    }
}
