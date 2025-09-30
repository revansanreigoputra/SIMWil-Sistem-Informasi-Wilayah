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
        Schema::create('subsektor_kerajinans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->bigInteger('total_nilai_produksi_tahun_ini')->nullable(); // Total nilai produksi tahun ini (Rp)
            $table->bigInteger('total_nilai_bahan_baku_digunakan')->nullable(); // Total nilai bahan baku yang digunakan (Rp)
            $table->bigInteger('total_nilai_bahan_penolong_digunakan')->nullable(); // Total nilai bahan penolong yang digunakan (Rp)
            $table->bigInteger('total_biaya_antara_dihabiskan')->nullable(); // Total biaya antara yang dihabiskan (Rp)
            $table->integer('total_jenis_kerajinan_rumah_tangga')->nullable(); // Total jenis kerajinan rumah tangga (Jenis)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subsektor_kerajinans');
    }
};