<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('politiks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_desa');
            $table->date('tanggal');

            // Partai Politik dan Pemilihan Umum
            $table->integer('jumlah_penduduk_memiliki_hak_pilih')->nullable();
            $table->integer('jumlah_pengguna_hak_pilih_pemilu_legislatif')->nullable();
            $table->integer('jumlah_perempuan_aktif_partai_politik')->nullable();
            $table->integer('jumlah_partai_politik_memiliki_pengurus')->nullable();
            $table->integer('jumlah_partai_politik_memiliki_kantor')->nullable();
            $table->integer('jumlah_penduduk_pengurus_partai')->nullable();
            $table->integer('jumlah_penduduk_dipilih_legislatif')->nullable();
            $table->integer('jumlah_pengguna_hak_pilih_presiden')->nullable();

            // Pemilihan Kepala Daerah
            $table->integer('jumlah_penduduk_memiliki_hak_pilih_pilkada')->nullable();
            $table->integer('jumlah_pengguna_hak_pilih_bupati')->nullable();
            $table->integer('jumlah_pengguna_hak_pilih_gubernur')->nullable();

            // Penentuan Kepala Desa/Lurah dan Perangkat
            $table->enum('penentuan_jabatan_kepala_desa', [
                'dipilih_rakyat_langsung',
                'ditunjuk_bupati_walikota',
                'turun_temurun'
            ])->nullable();

            $table->enum('penentuan_sekretaris_desa', [
                'diangkat_kepala_desa',
                'diangkat_bupati_walikota',
                'diangkat_kepala_desa_disahkan_bupati'
            ])->nullable();

            $table->enum('penentuan_perangkat_desa', [
                'diangkat_kepala_desa_ditetapkan_camat',
                'diangkat_dan_ditetapkan_kepala_desa'
            ])->nullable();

            $table->integer('masa_jabatan_kepala_desa')->nullable();

            $table->enum('penentuan_jabatan_lurah', [
                'diangkat_bupati_walikota',
                'dipilih_rakyat_langsung'
            ])->nullable();

            // BPD
            $table->integer('jumlah_anggota_bpd')->nullable();

            $table->enum('penentuan_anggota_bpd', [
                'dipilih_rakyat_langsung',
                'dipilih_musyawarah_masyarakat',
                'diangkat_kepala_desa',
                'diangkat_camat'
            ])->nullable();

            $table->enum('pimpinan_bpd', [
                'dipilih_anggota_bpd',
                'ditunjuk_kepala_desa',
                'ditunjuk_camat',
                'dipilih_rakyat_langsung'
            ])->nullable();

            $table->enum('kantor_bpd', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('anggaran_bpd', ['Ada', 'Tidak Ada'])->nullable();

            $table->integer('peraturan_desa')->nullable();
            $table->integer('permintaan_keterangan_kepala_desa')->nullable();
            $table->integer('rancangan_perdes')->nullable();
            $table->integer('menyalurkan_aspirasi')->nullable();
            $table->integer('menyatakan_pendapat')->nullable();
            $table->integer('menyampaikan_usul')->nullable();
            $table->integer('mengevaluasi_apb_desa')->nullable();

            // Lembaga Kemasyarakatan Desa/Kelurahan (LKD/LKK)
            $table->enum('keberadaan_organisasi_lkd', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('dasar_hukum_organisasi_lkd',[
                'peraturan_desa',
                'keputusan_kepala_desa',
                'keputusan_camat',
                'belum_diatur'
            ])->nullable();
            $table->integer('jumlah_organisasi_lkd_desa')->nullable();
            $table->enum('dasar_hukum_pembentukan_lkd_kelurahan',[
                'keputusan_lurah',
                'keputusan_camat',
                'belum_diatur'
            ])->nullable();
            $table->integer('jumlah_organisasi_lkd_kelurahan')->nullable();

            // dari gambar: Pemilihan pengurus LKD/LKK
            $table->enum('pemilihan_pengurus_lkd', [
                'dipilih_rakyat_langsung',
                'diangkat_kepala_desa',
                'diangkat_camat'
            ])->nullable();

            // dari gambar: Pemilihan pengurus organisasi anggota LKD/LKK
            $table->enum('pemilihan_pengurus_organisasi_lkd', [
                'dipilih_rakyat_langsung',
                'diangkat_ketua_lkd_lkk',
                'diangkat_kepala_desa',
                'diangkat_camat'
            ])->nullable();

            // dari gambar: Implementasi tugas, fungsi, dan kewajiban LKD/LKK
            $table->enum('status_lkd', ['Aktif', 'Pasif'])->nullable();
            $table->integer('jumlah_kegiatan_lkd')->nullable();
            $table->enum('fungsi_tugas_lkd', ['Aktif', 'Pasif'])->nullable();
            $table->integer('jumlah_kegiatan_organisasi_lkd')->nullable();

            $table->enum('alokasi_anggaran_lkd', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('alokasi_anggaran_organisasi', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('kantor_lkd', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('dukungan_pembiayaan', ['Memadai', 'Kurang Memadai'])->nullable();
            $table->integer('realisasi_program_kerja')->nullable();
            $table->enum('keberadaan_alat_kelengkapan', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('kegiatan_administrasi', ['Berfungsi', 'Tidak Berfungsi'])->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('politiks');
    }
};
