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
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
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
            $table->foreignId('penentuan_kepala_desa_id')->constrained('penentuan_kepala_desa')->onDelete('cascade');
            $table->foreignId('penentuan_sekretaris_desa_id')->constrained('penentuan_sekretaris_desa')->onDelete('cascade');
            $table->foreignId('penentuan_perangkat_desa_id')->constrained('penentuan_perangkat_desa')->onDelete('cascade');

            $table->integer('masa_jabatan_kepala_desa')->nullable();
            $table->foreignId('penentuan_lurah_id')->constrained('penentuan_lurah')->onDelete('cascade');


            // BPD
            $table->integer('jumlah_anggota_bpd')->nullable();

            $table->foreignId('penentuan_anggota_bpd_id')->constrained('penentuan_anggota_bpd')->onDelete('cascade');
            $table->foreignId('penentuan_ketua_bpd_id')->constrained('penentuan_ketua_bpd')->onDelete('cascade');

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

            // dari gambar: Pemilihan pengurus LKD
            $table->foreignId('pengurus_lkd_id')->constrained('pengurus_lkd')->onDelete('cascade');

            // dari gambar: Pemilihan pengurus LKK
            $table->foreignId('pengurus_lkk_id')->constrained('pengurus_lkk')->onDelete('cascade');

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
