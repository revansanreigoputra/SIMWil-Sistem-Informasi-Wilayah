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
            $table->foreignId('desa_id')->constrained('desas')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal');
            $table->enum('penyampaian_laporan', ['ada', 'tidak_ada'])->nullable();
            $table->integer('jumlah_informasi')->nullable();
            $table->enum('status_laporan', ['diterima', 'ditolak'])->nullable();
            $table->enum('laporan_kinerja', ['diterima', 'ditolak'])->nullable();
            $table->integer('jumlah_media_informasi')->nullable();
            $table->integer('jumlah_pengaduan_diterima')->nullable();
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
