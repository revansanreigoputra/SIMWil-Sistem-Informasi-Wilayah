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
        Schema::create('desa_kelurahans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');

            // Bagian Gedung Kantor
            $table->enum('gedung_kantor', ['ada', 'tidak ada'])->nullable();
            $table->integer('ruang_kerja')->default(0);
            $table->enum('kondisi', ['baik', 'buruk'])->nullable();
            $table->enum('balai_desa', ['ada', 'tidak ada'])->nullable();
            $table->enum('listrik', ['ada', 'tidak ada'])->nullable();
            $table->enum('air_bersih', ['ada', 'tidak ada'])->nullable();
            $table->enum('telepon', ['ada', 'tidak ada'])->nullable();
            $table->enum('rumah_dinas_kepala_desa', ['ada', 'tidak ada'])->nullable();
            $table->enum('rumah_dinas_perangkat', ['ada', 'tidak ada'])->nullable();
            $table->enum('fasilitas_lainnya', ['ada', 'tidak ada'])->nullable();

            $table->integer('mesin_tik')->default(0);
            $table->integer('meja')->default(0);
            $table->integer('kursi')->default(0);
            $table->integer('lemari_arsip')->default(0);
            $table->integer('komputer')->default(0);
            $table->integer('mesin_fax')->default(0);
            $table->integer('kendaraan_dinas')->default(0);

            // Bagian Administrasi Pemerintahan
            $table->enum('buku_data_peraturan_desa', ['ada_dan_terisi', 'ada_dan_tidak_terisi', 'tidak_ada'])->nullable();
            $table->enum('buku_keputusan_kepala_desa', ['ada_dan_terisi', 'ada_dan_tidak_terisi', 'tidak_ada'])->nullable();
            $table->enum('buku_administrasi_kependudukan', ['ada_dan_terisi', 'ada_dan_tidak_terisi', 'tidak_ada'])->nullable();
            $table->enum('buku_data_inventaris', ['ada_dan_terisi', 'ada_dan_tidak_terisi', 'tidak_ada'])->nullable();
            $table->enum('buku_data_aparat', ['ada_dan_terisi', 'ada_dan_tidak_terisi', 'tidak_ada'])->nullable();
            $table->enum('buku_data_tanah_kas_desa', ['ada_dan_terisi', 'ada_dan_tidak_terisi', 'tidak_ada'])->nullable();
            $table->enum('buku_administrasi_pajak', ['ada_dan_terisi', 'ada_dan_tidak_terisi', 'tidak_ada'])->nullable();
            $table->enum('buku_data_tanah', ['ada_dan_terisi', 'ada_dan_tidak_terisi', 'tidak_ada'])->nullable();
            $table->enum('buku_laporan_pengaduan', ['ada_dan_terisi', 'ada_dan_tidak_terisi', 'tidak_ada'])->nullable();
            $table->enum('buku_agenda_ekspedisi', ['ada_dan_terisi', 'ada_dan_tidak_terisi', 'tidak_ada'])->nullable();
            $table->enum('buku_profil_desa', ['ada_dan_terisi', 'ada_dan_tidak_terisi', 'tidak_ada'])->nullable();
            $table->enum('buku_data_induk_penduduk', ['ada_dan_terisi', 'ada_dan_tidak_terisi', 'tidak_ada'])->nullable();
            $table->enum('buku_data_mutasi_penduduk', ['ada_dan_terisi', 'ada_dan_tidak_terisi', 'tidak_ada'])->nullable();
            $table->enum('buku_rekapitulasi_penduduk', ['ada_dan_terisi', 'ada_dan_tidak_terisi', 'tidak_ada'])->nullable();
            $table->enum('buku_registrasi_pelayanan', ['ada_dan_terisi', 'ada_dan_tidak_terisi', 'tidak_ada'])->nullable();
            $table->enum('buku_data_penduduk_sementara', ['ada_dan_terisi', 'ada_dan_tidak_terisi', 'tidak_ada'])->nullable();
            $table->enum('buku_anggaran_penerimaan', ['ada_dan_terisi', 'ada_dan_tidak_terisi', 'tidak_ada'])->nullable();
            $table->enum('buku_agenda_pengeluaran', ['ada_dan_terisi', 'ada_dan_tidak_terisi', 'tidak_ada'])->nullable();
            $table->enum('buku_kas_umum', ['ada_dan_terisi', 'ada_dan_tidak_terisi', 'tidak_ada'])->nullable();
            $table->enum('buku_kas_pembantu_penerimaan', ['ada_dan_terisi', 'ada_dan_tidak_terisi', 'tidak_ada'])->nullable();
            $table->enum('buku_kas_pembantu_pengeluaran', ['ada_dan_terisi', 'ada_dan_tidak_terisi', 'tidak_ada'])->nullable();
            $table->enum('buku_lembaga_kemasyarakatan', ['ada_dan_terisi', 'ada_dan_tidak_terisi', 'tidak_ada'])->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desa_kelurahans');
    }
};