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
        Schema::create('sektor_pertambangan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('total_nilai_produksi_tahun_ini');
            $table->integer('total_nilai_bahan_baku_digunakan');
            $table->integer('total_nilai_bahan_penolong_digunakan');
            $table->integer('total_biaya_antara_dihabiskan');
            $table->integer('jumlah_total_jenis_bahan_tambang_dan_galian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sektor_pertambangan');
    }
};