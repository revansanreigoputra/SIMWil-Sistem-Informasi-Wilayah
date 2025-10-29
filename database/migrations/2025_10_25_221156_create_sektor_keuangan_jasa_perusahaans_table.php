<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sektor_keuangan_jasa_perusahaans', function (Blueprint $table) {
            $table->id();

            // Relasi ke desa
            $table->unsignedBigInteger('desa_id')->nullable();
            $table->foreign('desa_id')->references('id')->on('desas')->onDelete('cascade');

            $table->date('tanggal');

            // Sub-Sektor Bank
            $table->integer('jumlah_transaksi_perbankan')->nullable();
            $table->bigInteger('nilai_transaksi_perbankan')->nullable();
            $table->bigInteger('biaya_perbankan')->nullable();

            // Sub-Sektor Lembaga Keuangan Bukan Bank
            $table->integer('jumlah_lembaga_bukan_bank')->nullable();
            $table->integer('jumlah_kegiatan_lembaga_bukan_bank')->nullable();
            $table->bigInteger('nilai_transaksi_bukan_bank')->nullable();
            $table->bigInteger('biaya_bukan_bank')->nullable();

            // Sub-Sektor Sewa Bangunan
            $table->integer('jumlah_usaha_sewa')->nullable();
            $table->bigInteger('nilai_sewa')->nullable();
            $table->bigInteger('biaya_sewa')->nullable();
            $table->bigInteger('biaya_lain_sewa')->nullable();

            // Sub-Sektor Jasa Perusahaan
            $table->integer('jumlah_perusahaan_jasa')->nullable();
            $table->bigInteger('nilai_transaksi_perusahaan')->nullable();
            $table->bigInteger('biaya_perusahaan')->nullable();
            $table->bigInteger('biaya_lain_perusahaan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sektor_keuangan_jasa_perusahaans');
    }
};
