<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'role.view',
            'role.update',
            'user.view',
            'user.create',
            'user.store',
            'user.edit',
            'user.update',
            'user.delete',
            // Settings permissions
            'setting.view',
            'setting.update',
            // Kepala Desa permissions
            'kepala-desa.view',
            'kepala-desa.create',
            'kepala-desa.store',
            'kepala-desa.update',
            'kepala-desa.delete',
            // desa permissions
            'kecamatan.view',
            'kecamatan.create',
            'kecamatan.store',
            'kecamatan.update',
            'kecamatan.delete',
            // desa permissions
            'desa.view',
            'desa.create',
            'desa.store',
            'desa.update',
            'desa.delete',
            // jabatan permissions
            'jabatan.view',
            'jabatan.create',
            'jabatan.store',
            'jabatan.update',
            'jabatan.delete',
            // perangkat desa permissions
            'perangkat_desa.view',
            'perangkat_desa.create',
            'perangkat_desa.store',
            'perangkat_desa.update',
            'perangkat_desa.delete',

            // data keluarga permissions
            'data_keluarga.view',
            'data_keluarga.create',
            'data_keluarga.store',
            'data_keluarga.show',
            'data_keluarga.edit',
            'data_keluarga.update',
            'data_keluarga.delete',
            'data_keluarga.destroy',
            'data_keluarga.export',
            'data_keluarga.import',

            // Anggota Keluarga Permissions
            'anggota_keluarga.view',
            'anggota_keluarga.create',
            'anggota_keluarga.store',
            'anggota_keluarga.edit',
            'anggota_keluarga.update',
            'anggota_keluarga.delete',
            'anggota_keluarga.destroy',
            'anggota_keluarga.show',
            // Mutasi permissions
            'mutasi.data.view',
            'mutasi.data.create',
            'mutasi.data.store',
            'mutasi.data.edit',
            'mutasi.data.update',
            'mutasi.data.destroy',
            'mutasi.laporan.view',
            'mutasi.laporan.export',

            // ttd (penanda tangan) permissions
            'ttd.view',
            'ttd.create',
            'ttd.store',
            'ttd.update',
            'ttd.delete',
            'data_keluarga.edit',
            'data_keluarga.update',
            'data_keluarga.delete',
            'data_keluarga.destroy',

            // Jumlah permissions
            'jumlah.view',
            'jumlah.create',
            'jumlah.store',
            'jumlah.update',
            'jumlah.delete',

            // potensi permissions
            'potensi.laporan.view',
            'potensi.laporan.export',

            // POTENSI KELEMBAGAAN permissions
            // pemerintah permissions
            'potensi.kelembagaan.pemerintah.view',
            'potensi.kelembagaan.pemerintah.create',
            'potensi.kelembagaan.pemerintah.store',
            'potensi.kelembagaan.pemerintah.edit',
            'potensi.kelembagaan.pemerintah.update',
            'potensi.kelembagaan.pemerintah.delete',
            'potensi.kelembagaan.pemerintah.destroy',
            'potensi.kelembagaan.pemerintah.print',

            // politik permissions
            'lembaga-politik.view',
            'lembaga-politik.create',
            'lembaga-politik.edit',
            'lembaga-politik.delete',
            'lembaga-politik.print',
            'lembaga-politik.download',
            // ekonomi permissions
            'lembaga-ekonomi.view',
            'lembaga-ekonomi.create',
            'lembaga-ekonomi.edit',
            'lembaga-ekonomi.delete',
            'lembaga-ekonomi.print',
            'lembaga-ekonomi.download',
            // pengangkutan permissions
            'view-pengangkutan',
            'create-pengangkutan',
            'edit-pengangkutan',
            'delete-pengangkutan',
            'print-pengangkutan',
            'download-pengangkutan',
            //  permissions hiburan
            'hiburan.index',
            'hiburan.create',
            'hiburan.edit',
            'hiburan.show',
            'hiburan.delete',
            'hiburan.print',
            'hiburan.download',
            //  permissions pendidikan
            'pendidikan.index',
            'pendidikan.create',
            'pendidikan.edit',
            'pendidikan.show',
            'pendidikan.delete',
            'pendidikan.print',
            'pendidikan.download',
            //  permissions keamanan
            'keamanan.index',
            'keamanan.create',
            'keamanan.edit',
            'keamanan.show',
            'keamanan.delete',
            'keamanan.print',
            'keamanan.download',

            // layanan surat permissions
            'permohonan.view',
            'permohonan.create',
            'permohonan.store',
            'permohonan.edit',
            'permohonan.update',
            'permohonan.delete',
            'permohonan.cetak',

            // template permissions
            'kop_template.view',
            'kop_template.create',
            'kop_template.store',
            'kop_template.edit',
            'kop_template.update',
            'kop_template.delete',
            'kop_template.destroy',

            'jenis_surat.view',
            'jenis_surat.create',
            'jenis_surat.store',
            'jenis_surat.edit',
            'jenis_surat.update',
            'jenis_surat.delete',
            'jenis_surat.destroy',

            // berita permissions
            'berita.view',
            'berita.create',
            'berita.update',
            'berita.delete',

            // agenda permissions
            'agenda.view',
            'agenda.create',
            'agenda.update',
            'agenda.delete',

            // Glosarium permissions
            'glosarium.view',
            'glosarium.create',
            'glosarium.update',
            'glosarium.delete',

            // transportasi_darat permissions
            'transportasi_darat.view',
            'transportasi_darat.create',
            'transportasi_darat.store',
            'transportasi_darat.update',
            'transportasi_darat.delete',

            // Irigasi
            'irigasi.view',
            'irigasi.create',
            'irigasi.store',
            'irigasi.edit',
            'irigasi.update',
            'irigasi.delete',

            // usia permissions
            'usia.view',
            'usia.create',
            'usia.store',
            'usia.update',
            'usia.delete',

            // Potensi Pendidikan permissions
            'p_pendidikan.view',
            'p_pendidikan.create',
            'p_pendidikan.store',
            'p_pendidikan.update',
            'p_pendidikan.delete',

            // Potensi Mata Pencaharian Pokok permissions
            'mata_pencaharian_pokok.view',
            'mata_pencaharian_pokok.create',
            'mata_pencaharian_pokok.store',
            'mata_pencaharian_pokok.update',
            'mata_pencaharian_pokok.delete',

            // Potensi Agama permissions
            'p_agama.view',
            'p_agama.create',
            'p_agama.store',
            'p_agama.update',
            'p_agama.delete',

            // Potensi Kewarganegaraan permissions
            'p_kewarganegaraan.view',
            'p_kewarganegaraan.create',
            'p_kewarganegaraan.store',
            'p_kewarganegaraan.update',
            'p_kewarganegaraan.delete',

            // Potensi Cacat permissions
            'p_cacat.view',
            'p_cacat.create',
            'p_cacat.store',
            'p_cacat.update',
            'p_cacat.delete',

            // Potensi Etnis Suku permissions
            'p_etnis_suku.view',
            'p_etnis_suku.create',
            'p_etnis_suku.store',
            'p_etnis_suku.update',
            'p_etnis_suku.delete',

            // Potensi Tenaga Kerja permissions
            'p_tenaga_kerja.view',
            'p_tenaga_kerja.create',
            'p_tenaga_kerja.store',
            'p_tenaga_kerja.update',
            'p_tenaga_kerja.delete',

            // Potensi Kualitas Angkatan Kerja permissions
            'p_kualitas_angkatan_kerja.view',
            'p_kualitas_angkatan_kerja.create',
            'p_kualitas_angkatan_kerja.store',
            'p_kualitas_angkatan_kerja.update',
            'p_kualitas_angkatan_kerja.delete',

            // Irigasi
            'irigasi.view',
            'irigasi.create',
            'irigasi.store',
            'irigasi.edit',
            'irigasi.update',
            'irigasi.delete',

            // Sarana Transportasi
            'angkutan.view',
            'angkutan.create',
            'angkutan.store',
            'angkutan.edit',
            'angkutan.update',
            'angkutan.delete',

            // Sanitasi
            'sanitasi.view',
            'sanitasi.create',
            'sanitasi.store',
            'sanitasi.edit',
            'sanitasi.update',
            'sanitasi.delete',

            // Air Bersih
            'air_bersih.view',
            'air_bersih.create',
            'air_bersih.store',
            'air_bersih.update',
            'air_bersih.delete',

            // dkelurahan
            'dkelurahan.view',
            'dkelurahan.create',
            'dkelurahan.store',
            'dkelurahan.update',
            'dkelurahan.delete',

            // bpd
            'bpd.view',
            'bpd.create',
            'bpd.store',
            'bpd.update',
            'bpd.delete',

            // dusun
            'dusun.view',
            'dusun.create',
            'dusun.store',
            'dusun.update',
            'dusun.delete',

            // komunikasiinformasi
            'komunikasiinformasi.view',
            'komunikasiinformasi.create',
            'komunikasiinformasi.store',
            'komunikasiinformasi.update',
            'komunikasiinformasi.delete',

            // potensi-kelembagaan-adat
            'adat.view',
            'adat.create',
            'adat.store',
            'adat.update',
            'adat.delete',

            'adat.print',
            'adat.download',

            // kemasyarakatan
            'kemasyarakatan.view',
            'kemasyarakatan.create',
            'kemasyarakatan.store',
            'kemasyarakatan.update',
            'kemasyarakatan.delete',

            // peribadatan
            'peribadatan.view',
            'peribadatan.create',
            'peribadatan.store',
            'peribadatan.update',
            'peribadatan.delete',

            // olahraga
            'olahraga.view',
            'olahraga.create',
            'olahraga.store',
            'olahraga.update',
            'olahraga.delete',

            // kesehatan
            'kesehatan.view',
            'kesehatan.create',
            'kesehatan.store',
            'kesehatan.update',
            'kesehatan.delete',

            // ppendidikan
            'ppendidikan.view',
            'ppendidikan.create',
            'ppendidikan.store',
            'ppendidikan.update',
            'ppendidikan.delete',

            // area_wisata permissions
            'area_wisata.view',
            'area_wisata.create',
            'area_wisata.store',
            'area_wisata.update',
            'area_wisata.delete',

            // pencemaran permissions
            'pencemaran.view',
            'pencemaran.create',
            'pencemaran.store',
            'pencemaran.update',
            'pencemaran.delete',

            // ruang_publik permissions
            'ruang_publik.view',
            'ruang_publik.create',
            'ruang_publik.store',
            'ruang_publik.update',
            'ruang_publik.delete',

            // hiburan
            'hiburan.view',
            'hiburan.create',
            'hiburan.store',
            'hiburan.update',
            'hiburan.delete',

            // kebersihan
            'kebersihan.view',
            'kebersihan.create',
            'kebersihan.store',
            'kebersihan.update',
            'kebersihan.delete',

            // Sarana kesehatan
            'skesehatan.view',
            'skesehatan.create',
            'skesehatan.store',
            'skesehatan.update',
            'skesehatan.delete',

            // energi dan penerangan
            'energiPenerangan.view',
            'energiPenerangan.create',
            'energiPenerangan.store',
            'energiPenerangan.update',
            'energiPenerangan.delete',

            // umum batas wilayah
            'batas_wilayah.view',
            'batas_wilayah.create',
            'batas_wilayah.store',
            'batas_wilayah.update',
            'batas_wilayah.delete',

            // apb
            'apb.view',
            'apb.create',
            'apb.store',
            'apb.edit',
            'apb.update',
            'apb.delete',

            // potensi sda
            // topografi
            'topografi.view',
            'topografi.create',
            'topografi.store',
            'topografi.edit',
            'topografi.update',
            'topografi.delete',

            // kualitas udara
            'kualitas-udara.view',
            'kualitas-udara.create',
            'kualitas-udara.store',
            'kualitas-udara.edit',
            'kualitas-udara.update',
            'kualitas-udara.delete',

            // kebisingan
            'kebisingan.view',
            'kebisingan.create',
            'kebisingan.store',
            'kebisingan.edit',
            'kebisingan.update',
            'kebisingan.delete',

            // jlahan
            'jlahan.view',
            'jlahan.create',
            'jlahan.store',
            'jlahan.edit',
            'jlahan.update',
            'jlahan.delete',

            // iklim
            'iklim.view',
            'iklim.create',
            'iklim.store',
            'iklim.edit',
            'iklim.update',
            'iklim.delete',

            // lahan
            'lahan.view',
            'lahan.create',
            'lahan.store',
            'lahan.edit',
            'lahan.update',
            'lahan.delete',

            // hasil
            'hasiltanaman.view',
            'hasiltanaman.create',
            'hasiltanaman.store',
            'hasiltanaman.edit',
            'hasiltanaman.update',
            'hasiltanaman.delete',

            // kepemilikan
            'kepemilikan.view',
            'kepemilikan.create',
            'kepemilikan.store',
            'kepemilikan.edit',
            'kepemilikan.update',
            'kepemilikan.delete',

            // hasilbuah
            'hasilbuah.view',
            'hasilbuah.create',
            'hasilbuah.store',
            'hasilbuah.edit',
            'hasilbuah.update',
            'hasilbuah.delete',

            // apotikhidup
            'apotikhidup.view',
            'apotikhidup.create',
            'apotikhidup.store',
            'apotikhidup.edit',
            'apotikhidup.update',
            'apotikhidup.delete',

            // kebun
            'kebun.view',
            'kebun.create',
            'kebun.store',
            'kebun.edit',
            'kebun.update',
            'kebun.delete',

            // hasilkebun
            'hasilkebun.view',
            'hasilkebun.create',
            'hasilkebun.store',
            'hasilkebun.edit',
            'hasilkebun.update',
            'hasilkebun.delete',

            // hutan
            'hutan.view',
            'hutan.create',
            'hutan.store',
            'hutan.edit',
            'hutan.update',
            'hutan.delete',

            // hasilhutan
            'hasilhutan.view',
            'hasilhutan.create',
            'hasilhutan.store',
            'hasilhutan.edit',
            'hasilhutan.update',
            'hasilhutan.delete',

            // kondisihutan
            'kondisihutan.view',
            'kondisihutan.create',
            'kondisihutan.store',
            'kondisihutan.edit',
            'kondisihutan.update',
            'kondisihutan.delete',

            // dampakpengolahan
            'dampakpengolahan.view',
            'dampakpengolahan.create',
            'dampakpengolahan.store',
            'dampakpengolahan.edit',
            'dampakpengolahan.update',
            'dampakpengolahan.delete',

            // jenis populasi ternak permissions
            'jenis-populasi-ternak.view',
            'jenis-populasi-ternak.create',
            'jenis-populasi-ternak.store',
            'jenis-populasi-ternak.edit',
            'jenis-populasi-ternak.update',
            'jenis-populasi-ternak.delete',
            'jenis-populasi-ternak.destroy',

            // produksi ternak permissions
            'produksi-ternak.view',
            'produksi-ternak.create',
            'produksi-ternak.store',
            'produksi-ternak.edit',
            'produksi-ternak.update',
            'produksi-ternak.delete',

            // pengolahan hasil ternak permissions
            'pengolahan-hasil-ternak.view',
            'pengolahan-hasil-ternak.create',
            'pengolahan-hasil-ternak.store',
            'pengolahan-hasil-ternak.edit',
            'pengolahan-hasil-ternak.update',
            'pengolahan-hasil-ternak.delete',

            // lahan pakan ternak permissions
            'lahan-pakan-ternak.view',
            'lahan-pakan-ternak.create',
            'lahan-pakan-ternak.store',
            'lahan-pakan-ternak.edit',
            'lahan-pakan-ternak.update',
            'lahan-pakan-ternak.delete',

            //sektor tambang
            'sektor-tambang.view',
            'sektor-tambang.store',
            'sektor-tambang.update',
            'sektor-tambang.destroy',

            // sektor pertambangan
            'sektor-perdagangan.view',
            'sektor-perdagangan.create',
            'sektor-perdagangan.show',
            'sektor-perdagangan.edit',
            'sektor-perdagangan.destroy',

            // sektor industri kecil

            'sektor-industri-kecil.view',
            'sektor-industri-kecil.create',
            'sektor-industri-kecil.destroy',
            'sektor-industri-kecil.show',

            // sektor industri besar dan menengah

            'sektor-industri-menengah-besar.view',
            'sektor-industri-menengah-besar.destroy',
            'sektor-industri-menengah-besar.show',
            'sektor-industri-menengah-besar.create',

            //sektor jasa usaha mata pencaharian
            'sektor-jasa-usaha.view',
            'sektor-jasa-usaha.show',
            'sektor-jasa-usaha.update',
            'sektor-jasa-usaha.destroy',
            'sektor-jasa-usaha.store',

            // Pertanggungjawaban
            'pertanggungjawaban.view',
            'pertanggungjawaban.create',
            'pertanggungjawaban.store',
            'pertanggungjawaban.edit',
            'pertanggungjawaban.update',
            'pertanggungjawaban.delete',

            //pembinaan Pusat
            'pembinaanpusat.view',
            'pembinaanpusat.create',
            'pembinaanpusat.store',
            'pembinaanpusat.edit',
            'pembinaanpusat.update',
            'pembinaanpusat.delete',

            //pembinaan Provinsi
            'pembinaanprovinsi.view',
            'pembinaanprovinsi.create',
            'pembinaanprovinsi.store',
            'pembinaanprovinsi.edit',
            'pembinaanprovinsi.update',
            'pembinaanprovinsi.delete',

            //pembinaan Kabupaten
            'pembinaankabupaten.view',
            'pembinaankabupaten.create',
            'pembinaankabupaten.store',
            'pembinaankabupaten.edit',
            'pembinaankabupaten.update',
            'pembinaankabupaten.delete',

            //pembinaan Kecamatan
            'pembinaankecamatan.view',
            'pembinaankecamatan.create',
            'pembinaankecamatan.store',
            'pembinaankecamatan.edit',
            'pembinaankecamatan.update',
            'pembinaankecamatan.delete',

            //organisasi
            'organisasi.view',
            'organisasi.create',
            'organisasi.store',
            'organisasi.edit',
            'organisasi.update',
            'organisasi.delete',

            //musrenbang
            'musrenbangdesa.view',
            'musrenbangdesa.create',
            'musrenbangdesa.store',
            'musrenbangdesa.edit',
            'musrenbangdesa.update',
            'musrenbangdesa.delete',

            //hasil Pembangunan
            'hasilpembangunan.view',
            'hasilpembangunan.create',
            'hasilpembangunan.store',
            'hasilpembangunan.edit',
            'hasilpembangunan.update',
            'hasilpembangunan.delete',

            // gotong royong
            'gotongroyong.view',
            'gotongroyong.create',
            'gotongroyong.store',
            'gotongroyong.edit',
            'gotongroyong.update',
            'gotongroyong.delete',

            // adat istiadat
            'adatistiadat.view',
            'adatistiadat.create',
            'adatistiadat.store',
            'adatistiadat.edit',
            'adatistiadat.update',
            'adatistiadat.delete',

            //sikap dan mental
            'sikapdanmental.view',
            'sikapdanmental.create',
            'sikapdanmental.store',
            'sikapdanmental.edit',
            'sikapdanmental.update',
            'sikapdanmental.delete',

            //berbangsa
            'berbangsa.view',
            'berbangsa.create',
            'berbangsa.store',
            'berbangsa.edit',
            'berbangsa.update',
            'berbangsa.delete',

            //pajak
            'pajak.view',
            'pajak.create',
            'pajak.store',
            'pajak.edit',
            'pajak.update',
            'pajak.delete',

            //politik
            'politik.view',
            'politik.create',
            'politik.store',
            'politik.edit',
            'politik.update',
            'politik.delete',

            //Konflik Sara
            'konfliksara.view',
            'konfliksara.create',
            'konfliksara.store',
            'konfliksara.edit',
            'konfliksara.update',
            'konfliksara.delete',

            //Perkelahian
            'perkelahian.view',
            'perkelahian.create',
            'perkelahian.store',
            'perkelahian.edit',
            'perkelahian.update',
            'perkelahian.delete',

            //Pencurian
            'pencurian.view',
            'pencurian.create',
            'pencurian.store',
            'pencurian.edit',
            'pencurian.update',
            'pencurian.delete',

            //Penjarahan
            'penjarahan.view',
            'penjarahan.create',
            'penjarahan.store',
            'penjarahan.edit',
            'penjarahan.update',
            'penjarahan.delete',

            //Perjudian
            'perjudian.view',
            'perjudian.create',
            'perjudian.store',
            'perjudian.edit',
            'perjudian.update',
            'perjudian.delete',

            //Miras
            'miras.view',
            'miras.create',
            'miras.store',
            'miras.edit',
            'miras.update',
            'miras.delete',

            //prostitusi
            'prostitusi.view',
            'prostitusi.create',
            'prostitusi.store',
            'prostitusi.edit',
            'prostitusi.update',
            'prostitusi.delete',

            //pembunuhan
            'pembunuhan.view',
            'pembunuhan.create',
            'pembunuhan.store',
            'pembunuhan.edit',
            'pembunuhan.update',
            'pembunuhan.delete',

            //penculikan
            'penculikan.view',
            'penculikan.create',
            'penculikan.store',
            'penculikan.edit',
            'penculikan.update',
            'penculikan.delete',

            //seksual
            'seksual.view',
            'seksual.create',
            'seksual.store',
            'seksual.edit',
            'seksual.update',
            'seksual.delete',

            //sosial
            'sosial.view',
            'sosial.create',
            'sosial.store',
            'sosial.edit',
            'sosial.update',
            'sosial.delete',

            //kdrt
            'kdrt.view',
            'kdrt.create',
            'kdrt.store',
            'kdrt.edit',
            'kdrt.update',
            'kdrt.delete',

            //teror
            'teror.view',
            'teror.create',
            'teror.store',
            'teror.edit',
            'teror.update',
            'teror.delete',

            //sistem keamanan
            'sistemkeamanan.view',
            'sistemkeamanan.create',
            'sistemkeamanan.store',
            'sistemkeamanan.edit',
            'sistemkeamanan.update',
            'sistemkeamanan.delete',


            // potensi permissions
            'potensi.laporan.view',
            'potensi.laporan.export',

            // layanan surat permissions
            'layanan_surat.view',
            'layanan_surat.create',
            'layanan_surat.store',
            'layanan_surat.edit',
            'layanan_surat.update',
            'layanan_surat.delete',
            'layanan_surat.cetak',
            // template permissions
            'kop_template.view',
            'kop_template.create',
            'kop_template.store',
            'kop_template.edit',
            'kop_template.update',
            'kop_template.delete',
            'kop_template.destroy',

            'format_nomor_surat.view',
            'format_nomor_surat.create',
            'format_nomor_surat.store',
            'format_nomor_surat.edit',
            'format_nomor_surat.update',
            'format_nomor_surat.delete',
            'format_nomor_surat.destroy',

            // berita permissions
            'berita.view',
            'berita.create',
            'berita.update',
            'berita.delete',

            // agenda permissions
            'agenda.view',
            'agenda.create',
            'agenda.update',
            'agenda.delete',

            //LembagaKemasyarakatan permissions
            'lembaga-kemasyarakatan.view',
            'lembaga-kemasyarakatan.create',
            'lembaga-kemasyarakatan.store',
            'lembaga-kemasyarakatan.show',
            'lembaga-kemasyarakatan.edit',
            'lembaga-kemasyarakatan.update',
            'lembaga-kemasyarakatan.destroy',
            'lembaga-kemasyarakatan.print',

            // PAlatProduksiIkanLaut permissions
            'p-alat-produksi-ikan-laut.view',
            'p-alat-produksi-ikan-laut.create',
            'p-alat-produksi-ikan-laut.store',
            'p-alat-produksi-ikan-laut.edit',
            'p-alat-produksi-ikan-laut.update',
            'p-alat-produksi-ikan-laut.delete',

            // PAlatProduksiIkanTawar permissions
            'p-alat-produksi-ikan-tawar.view',
            'p-alat-produksi-ikan-tawar.create',
            'p-alat-produksi-ikan-tawar.store',
            'p-alat-produksi-ikan-tawar.edit',
            'p-alat-produksi-ikan-tawar.update',
            'p-alat-produksi-ikan-tawar.delete',

            // SumberDayaAir permissions
            'sumber-daya-air.view',
            'sumber-daya-air.create',
            'sumber-daya-air.store',
            'sumber-daya-air.show',
            'sumber-daya-air.edit',
            'sumber-daya-air.update',
            'sumber-daya-air.delete',

            // PSumberAirBersih permissions
            'p-sumber-air-bersih.view',
            'p-sumber-air-bersih.create',
            'p-sumber-air-bersih.store',
            'p-sumber-air-bersih.edit',
            'p-sumber-air-bersih.update',
            'p-sumber-air-bersih.delete',

            // PSumberAirPanas permissions
            'p-sumber-air-panas.view',
            'p-sumber-air-panas.create',
            'p-sumber-air-panas.store',
            'p-sumber-air-panas.edit',
            'p-sumber-air-panas.update',
            'p-sumber-air-panas.delete',

            // PNamaIkan permissions
            'p-nama-ikan.view',
            'p-nama-ikan.create',
            'p-nama-ikan.store',
            'p-nama-ikan.edit',
            'p-nama-ikan.update',
            'p-nama-ikan.delete',

            // DepositProduksiGalian permissions
            'deposit-produksi-galian.view',
            'deposit-produksi-galian.create',
            'deposit-produksi-galian.store',
            'deposit-produksi-galian.edit',
            'deposit-produksi-galian.update',
            'deposit-produksi-galian.delete',

            // Kualitas Air Minum permissions
            'kualitas-air-minum.view',
            'kualitas-air-minum.create',
            'kualitas-air-minum.store',
            'kualitas-air-minum.edit',
            'kualitas-air-minum.update',
            'kualitas-air-minum.delete',

            // produksi ternak permissions
            'produksi-ternak.view',
            'produksi-ternak.create',
            'produksi-ternak.store',
            'produksi-ternak.edit',
            'produksi-ternak.update',
            'produksi-ternak.delete',

            // pengolahan hasil ternak permissions
            'pengolahan-hasil-ternak.view',
            'pengolahan-hasil-ternak.create',
            'pengolahan-hasil-ternak.store',
            'pengolahan-hasil-ternak.edit',
            'pengolahan-hasil-ternak.update',
            'pengolahan-hasil-ternak.delete',

            // lahan pakan ternak permissions
            'lahan-pakan-ternak.view',
            'lahan-pakan-ternak.create',
            'lahan-pakan-ternak.store',
            'lahan-pakan-ternak.edit',
            'lahan-pakan-ternak.update',
            'lahan-pakan-ternak.delete',

            //sektor tambang
            'sektor-tambang.view',
            'sektor-tambang.store',
            'sektor-tambang.update',
            'sektor-tambang.destroy',

            // sektor pertambangan
            'sektor-perdagangan.view',
            'sektor-perdagangan.create',
            'sektor-perdagangan.show',
            'sektor-perdagangan.edit',
            'sektor-perdagangan.destroy',

            // sektor industri kecil

            'sektor-industri-kecil.view',
            'sektor-industri-kecil.create',
            'sektor-industri-kecil.destroy',
            'sektor-industri-kecil.show',

            // sektor industri besar dan menengah

            'sektor-industri-menengah-besar.view',
            'sektor-industri-menengah-besar.destroy',
            'sektor-industri-menengah-besar.show',
            'sektor-industri-menengah-besar.create',

            //sektor jasa usaha mata pencaharian
            'sektor-jasa-usaha.view',
            'sektor-jasa-usaha.show',
            'sektor-jasa-usaha.update',
            'sektor-jasa-usaha.destroy',
            'sektor-jasa-usaha.store',

            // Pertanggungjawaban
            'pertanggungjawaban.view',
            'pertanggungjawaban.create',
            'pertanggungjawaban.store',
            'pertanggungjawaban.edit',
            'pertanggungjawaban.update',
            'pertanggungjawaban.delete',

            //pembinaan Pusat
            'pembinaanpusat.view',
            'pembinaanpusat.create',
            'pembinaanpusat.store',
            'pembinaanpusat.edit',
            'pembinaanpusat.update',
            'pembinaanpusat.delete',

            //pembinaan Provinsi
            'pembinaanprovinsi.view',
            'pembinaanprovinsi.create',
            'pembinaanprovinsi.store',
            'pembinaanprovinsi.edit',
            'pembinaanprovinsi.update',
            'pembinaanprovinsi.delete',

            //pembinaan Kabupaten
            'pembinaankabupaten.view',
            'pembinaankabupaten.create',
            'pembinaankabupaten.store',
            'pembinaankabupaten.edit',
            'pembinaankabupaten.update',
            'pembinaankabupaten.delete',

            //pembinaan Kecamatan
            'pembinaankecamatan.view',
            'pembinaankecamatan.create',
            'pembinaankecamatan.store',
            'pembinaankecamatan.edit',
            'pembinaankecamatan.update',
            'pembinaankecamatan.delete',

            //organisasi
            'organisasi.view',
            'organisasi.create',
            'organisasi.store',
            'organisasi.edit',
            'organisasi.update',
            'organisasi.delete',

            //musrenbang
            'musrenbangdesa.view',
            'musrenbangdesa.create',
            'musrenbangdesa.store',
            'musrenbangdesa.edit',
            'musrenbangdesa.update',
            'musrenbangdesa.delete',

            //hasil Pembangunan
            'hasilpembangunan.view',
            'hasilpembangunan.create',
            'hasilpembangunan.store',
            'hasilpembangunan.edit',
            'hasilpembangunan.update',
            'hasilpembangunan.delete',

            // gotong royong
            'gotongroyong.view',
            'gotongroyong.create',
            'gotongroyong.store',
            'gotongroyong.edit',
            'gotongroyong.update',
            'gotongroyong.delete',

            // adat istiadat
            'adatistiadat.view',
            'adatistiadat.create',
            'adatistiadat.store',
            'adatistiadat.edit',
            'adatistiadat.update',
            'adatistiadat.delete',

            //sikap dan mental
            'sikapdanmental.view',
            'sikapdanmental.create',
            'sikapdanmental.store',
            'sikapdanmental.edit',
            'sikapdanmental.update',
            'sikapdanmental.delete',

            //berbangsa
            'berbangsa.view',
            'berbangsa.create',
            'berbangsa.store',
            'berbangsa.edit',
            'berbangsa.update',
            'berbangsa.delete',

            //pajak
            'pajak.view',
            'pajak.create',
            'pajak.store',
            'pajak.edit',
            'pajak.update',
            'pajak.delete',

            //politik
            'politik.view',
            'politik.create',
            'politik.store',
            'politik.edit',
            'politik.update',
            'politik.delete',

            //Konflik Sara
            'konfliksara.view',
            'konfliksara.create',
            'konfliksara.store',
            'konfliksara.edit',
            'konfliksara.update',
            'konfliksara.delete',

            //Perkelahian
            'perkelahian.view',
            'perkelahian.create',
            'perkelahian.store',
            'perkelahian.edit',
            'perkelahian.update',
            'perkelahian.delete',

            //Pencurian
            'pencurian.view',
            'pencurian.create',
            'pencurian.store',
            'pencurian.edit',
            'pencurian.update',
            'pencurian.delete',

            //Penjarahan
            'penjarahan.view',
            'penjarahan.create',
            'penjarahan.store',
            'penjarahan.edit',
            'penjarahan.update',
            'penjarahan.delete',

            //Perjudian
            'perjudian.view',
            'perjudian.create',
            'perjudian.store',
            'perjudian.edit',
            'perjudian.update',
            'perjudian.delete',

            //Miras
            'miras.view',
            'miras.create',
            'miras.store',
            'miras.edit',
            'miras.update',
            'miras.delete',

            //prostitusi
            'prostitusi.view',
            'prostitusi.create',
            'prostitusi.store',
            'prostitusi.edit',
            'prostitusi.update',
            'prostitusi.delete',

            //pembunuhan
            'pembunuhan.view',
            'pembunuhan.create',
            'pembunuhan.store',
            'pembunuhan.edit',
            'pembunuhan.update',
            'pembunuhan.delete',

            //penculikan
            'penculikan.view',
            'penculikan.create',
            'penculikan.store',
            'penculikan.edit',
            'penculikan.update',
            'penculikan.delete',

            //seksual
            'seksual.view',
            'seksual.create',
            'seksual.store',
            'seksual.edit',
            'seksual.update',
            'seksual.delete',

            //sosial
            'sosial.view',
            'sosial.create',
            'sosial.store',
            'sosial.edit',
            'sosial.update',
            'sosial.delete',

            //kdrt
            'kdrt.view',
            'kdrt.create',
            'kdrt.store',
            'kdrt.edit',
            'kdrt.update',
            'kdrt.delete',

            //teror
            'teror.view',
            'teror.create',
            'teror.store',
            'teror.edit',
            'teror.update',
            'teror.delete',

            //sistem keamanan
            'sistemkeamanan.view',
            'sistemkeamanan.create',
            'sistemkeamanan.store',
            'sistemkeamanan.edit',
            'sistemkeamanan.update',
            'sistemkeamanan.delete',


            // potensi permissions
            'potensi.laporan.view',
            'potensi.laporan.export',

            // layanan surat permissions
            'layanan_surat.view',
            'layanan_surat.create',
            'layanan_surat.store',
            'layanan_surat.edit',
            'layanan_surat.update',
            'layanan_surat.delete',
            'layanan_surat.cetak',
            // template permissions
            'kop_template.view',
            'kop_template.create',
            'kop_template.store',
            'kop_template.edit',
            'kop_template.update',
            'kop_template.delete',
            'kop_template.destroy',

            'format_nomor_surat.view',
            'format_nomor_surat.create',
            'format_nomor_surat.store',
            'format_nomor_surat.edit',
            'format_nomor_surat.update',
            'format_nomor_surat.delete',
            'format_nomor_surat.destroy',

            // berita permissions
            'berita.view',
            'berita.create',
            'berita.update',
            'berita.delete',

            // agenda permissions
            'agenda.view',
            'agenda.create',
            'agenda.update',
            'agenda.delete',

            //LembagaKemasyarakatan permissions
            'lembaga-kemasyarakatan.view',
            'lembaga-kemasyarakatan.create',
            'lembaga-kemasyarakatan.store',
            'lembaga-kemasyarakatan.show',
            'lembaga-kemasyarakatan.edit',
            'lembaga-kemasyarakatan.update',
            'lembaga-kemasyarakatan.destroy',
            'lembaga-kemasyarakatan.print',


        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign permissions to adminkabupaten role
        $adminKabupatenRole = Role::where('name', 'adminkabupaten')->first();
        if ($adminKabupatenRole) {
            $adminKabupatenRole->syncPermissions($permissions);
        }

        // Assign permissions to admindesa role
        $adminDesaRole = Role::where('name', 'admindesa')->first();
        if ($adminDesaRole) {
            $adminDesaRole->syncPermissions($permissions);
        }
    }
}
