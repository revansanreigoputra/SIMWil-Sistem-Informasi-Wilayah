<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sektor_listrik_gas_air_minums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('desa_id')->nullable();
            $table->foreign('desa_id')->references('id')->on('desas')->onDelete('cascade');

            $table->date('tanggal');

            // Sub sektor listrik
            $table->integer('jumlah_kegiatan_listrik')->nullable();
            $table->integer('nilai_produksi_listrik')->nullable();
            $table->integer('total_nilai_transaksi_listrik')->nullable();
            $table->integer('biaya_antara_listrik')->nullable();

            // Sub sektor gas
            $table->integer('jumlah_kegiatan_gas')->nullable();
            $table->integer('nilai_aset_produksi_gas')->nullable();
            $table->integer('nilai_transaksi_gas')->nullable();
            $table->integer('biaya_antara_gas')->nullable();

            // Sub sektor air minum
            $table->integer('jumlah_kegiatan_air')->nullable();
            $table->integer('nilai_aset_air')->nullable();
            $table->integer('nilai_produksi_air')->nullable();
            $table->integer('nilai_transaksi_air')->nullable();
            $table->integer('biaya_antara_air')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sektor_listrik_gas_air_minums');
    }
};
