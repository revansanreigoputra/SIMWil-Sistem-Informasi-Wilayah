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
        Schema::create('pertanggungjawabans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');

            // Radio button: Ada / Tidak Ada
            $table->enum('penyampaian_laporan', ['ada', 'tidak_ada'])->nullable();

            // Jumlah informasi yang disampaikan (numeric)
            $table->integer('jumlah_informasi')->nullable();

            // Status laporan: Diterima / Ditolak
            $table->enum('status_laporan', ['diterima', 'ditolak'])->nullable();

            // Laporan kinerja: Diterima / Ditolak
            $table->enum('laporan_kinerja', ['diterima', 'ditolak'])->nullable();

            // Jumlah jenis media informasi
            $table->integer('jumlah_media_informasi')->nullable();

            // Jumlah kasus pengaduan masyarakat yang disampaikan
            $table->integer('jumlah_pengaduan_diterima')->nullable();

            // Jumlah kasus pengaduan yang diselesaikan
            $table->integer('jumlah_pengaduan_selesai')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanggungjawabans');
    }
};
