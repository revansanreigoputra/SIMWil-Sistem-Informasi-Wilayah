<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sektor_perdagangan_hotel_restorans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('desa_id');
            $table->date('tanggal');

            // Sub-Sektor Perdagangan Besar
            $table->integer('total_jenis_perdagangan_besar')->nullable();
            $table->bigInteger('total_nilai_transaksi_besar')->nullable();
            $table->bigInteger('total_aset_perdagangan_besar')->nullable();
            $table->bigInteger('total_biaya_dikeluarkan_besar')->nullable();
            $table->bigInteger('total_biaya_antara_besar')->nullable();

            // Sub-Sektor Perdagangan Kecil
            $table->integer('total_jenis_perdagangan_kecil')->nullable();
            $table->bigInteger('total_nilai_transaksi_kecil')->nullable();
            $table->bigInteger('total_biaya_dikeluarkan_kecil')->nullable();
            $table->bigInteger('total_aset_perdagangan_kecil')->nullable();

            // Sub-Sektor Hotel
            $table->integer('total_penginapan')->nullable();
            $table->bigInteger('total_pendapatan_hotel')->nullable();
            $table->bigInteger('total_biaya_pemeliharaan_hotel')->nullable();
            $table->bigInteger('total_biaya_antara_hotel')->nullable();
            $table->bigInteger('total_pendapatan_diperoleh_hotel')->nullable();

            // Sub-Sektor Restoran
            $table->integer('total_tempat_konsumsi')->nullable();
            $table->bigInteger('biaya_konsumsi_dikeluarkan')->nullable();
            $table->bigInteger('biaya_lainnya_restoran')->nullable();
            $table->bigInteger('total_pendapatan_restoran')->nullable();

            $table->timestamps();

            $table->foreign('desa_id')->references('id')->on('desas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sektor_perdagangan_hotel_restorans');
    }
};
