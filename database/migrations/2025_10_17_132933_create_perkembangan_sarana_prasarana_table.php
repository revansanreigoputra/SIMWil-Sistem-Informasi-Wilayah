<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perkembangan_sarana_prasarana', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable();

            // 8 Kolom utama untuk tampilan index
            $table->string('fasilitas_umum')->nullable();
            $table->string('tenaga_kesehatan_aktif')->nullable();
            $table->string('kader_keluarga_lapangan')->nullable();
            $table->string('dokumentasi_posyandu')->nullable();
            $table->string('kegiatan_kesehatan')->nullable();
            $table->string('kegiatan_lingkungan')->nullable();
            $table->string('kegiatan_lainnya')->nullable();

            // Tambahan (input di +Data Baru dan Edit)
            $table->integer('jumlah_mck_umum')->nullable();
            $table->integer('jumlah_posyandu')->nullable();
            $table->integer('jumlah_kader_posyandu_aktif')->nullable();
            $table->integer('jumlah_pembina_posyandu')->nullable();
            $table->integer('jumlah_pengurus_dasawisma_aktif')->nullable();
            $table->integer('jumlah_kader_bina_keluarga_balita_aktif')->nullable();
            $table->integer('jumlah_petugas_lapangan_keluarga_berencana')->nullable();
            $table->string('buku_rencana_kegiatan_posyandu')->nullable();
            $table->string('buku_data_pengunjung_posyandu')->nullable();
            $table->string('buku_administrasi_posyandu_lainnya')->nullable();
            $table->integer('jumlah_kegiatan_posyandu')->nullable();
            $table->integer('jumlah_kader_kesehatan_lainnya')->nullable();
            $table->integer('jumlah_kegiatan_pengobatan_gratis')->nullable();
            $table->integer('jumlah_kegiatan_pemberantasan_psn')->nullable();
            $table->integer('jumlah_kegiatan_pembersihan_lingkungan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perkembangan_sarana_prasarana');
    }
};
