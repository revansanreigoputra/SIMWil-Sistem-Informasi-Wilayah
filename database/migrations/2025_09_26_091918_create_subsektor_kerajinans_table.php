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
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->date('tanggal');
            $table->bigInteger('total_nilai_produksi_tahun_ini')->nullable();
            $table->bigInteger('total_nilai_bahan_baku_digunakan')->nullable();
            $table->bigInteger('total_nilai_bahan_penolong_digunakan')->nullable();
            $table->bigInteger('total_biaya_antara_dihabiskan')->nullable();
            $table->integer('total_jenis_kerajinan_rumah_tangga')->nullable();
            $table->timestamps();

            $table->unique(['desa_id', 'tanggal']); // Satu desa hanya boleh punya satu data per tanggal
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
