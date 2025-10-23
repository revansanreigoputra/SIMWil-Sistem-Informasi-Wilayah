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
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->date('tanggal');

            // Sub-sektor Perdagangan Besar
            $table->integer('jumlah_jenis_perdagangan_besar')->nullable();
            $table->bigInteger('total_nilai_transaksi_besar')->nullable();
            $table->bigInteger('total_nilai_aset_perdagangan_besar')->nullable();
            $table->bigInteger('total_biaya_yang_dikeluarkan_besar')->nullable();
            $table->bigInteger('biaya_antara_lainnya_besar')->nullable();

            // Sub-sektor Perdagangan Kecil
            $table->integer('jumlah_jenis_perdagangan_kecil')->nullable();
            $table->bigInteger('total_nilai_transaksi_kecil')->nullable();
            $table->bigInteger('total_biaya_yang_dikeluarkan_kecil')->nullable();
            $table->bigInteger('total_nilai_aset_perdagangan_kecil')->nullable();

            // Sub-sektor Hotel
            $table->integer('jumlah_penginapan_dan_akomodasi')->nullable();
            $table->bigInteger('total_pendapatan_hotel')->nullable();
            $table->bigInteger('total_biaya_pemeliharaan')->nullable();
            $table->bigInteger('biaya_antara_hotel')->nullable();
            $table->bigInteger('pendapatan_diperoleh_hotel')->nullable();

            // Sub-sektor Restoran
            $table->integer('jumlah_tempat_konsumsi')->nullable();
            $table->bigInteger('biaya_konsumsi_dikeluarkan')->nullable();
            $table->bigInteger('biaya_antara_restoran')->nullable();
            $table->bigInteger('pendapatan_diperoleh_restoran')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sektor_perdagangan_hotel_restorans');
    }
};
