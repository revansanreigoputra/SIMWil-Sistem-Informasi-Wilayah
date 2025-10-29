<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sektor_jasa_jasas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('desa_id')->nullable();
            $table->foreign('desa_id')->references('id')->on('desas')->onDelete('cascade');

            $table->date('tanggal');

            // Sub Sektor Jasa Pemerintahan Umum
            $table->integer('jumlah_pelayanan_pemerintah')->nullable();
            $table->bigInteger('nilai_transaksi_pemerintah')->nullable();
            $table->bigInteger('biaya_pelayanan_pemerintah')->nullable();

            // Sub Sektor Jasa Swasta
            $table->integer('jumlah_usaha_swasta')->nullable();
            $table->bigInteger('nilai_aset_swasta')->nullable();
            $table->bigInteger('biaya_swasta')->nullable();

            // Sub Sektor Jasa Hiburan dan Rekreasi
            $table->integer('jumlah_usaha_hiburan')->nullable();
            $table->bigInteger('nilai_transaksi_hiburan')->nullable();
            $table->bigInteger('biaya_hiburan')->nullable();

            // Sub Sektor Jasa Perorangan dan Rumah Tangga
            $table->integer('jumlah_jasa_perorangan')->nullable();
            $table->bigInteger('nilai_aset_perorangan')->nullable();
            $table->bigInteger('nilai_transaksi_perorangan')->nullable();
            $table->bigInteger('biaya_perorangan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sektor_jasa_jasas');
    }
};
