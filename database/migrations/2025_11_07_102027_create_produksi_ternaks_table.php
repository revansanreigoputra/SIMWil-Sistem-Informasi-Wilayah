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
        Schema::create('produksi_ternaks', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('jenis_produksi_ternak_id')->constrained('jenis_produksi_ternaks')->onDelete('cascade');
            $table->decimal('hasil_produksi', 10, 2);
            $table->foreignId('satuan_produksi_ternak_id')->constrained('satuan_produksi_ternak')->onDelete('cascade');
            $table->decimal('nilai_produksi_tahun_ini', 15, 2)->nullable();
            $table->decimal('nilai_bahan_baku_yang_digunakan', 15, 2)->nullable();
            $table->decimal('nilai_bahan_penolong_yang_digunakan', 15, 2)->nullable();
            $table->integer('jumlah_ternak_tahun_ini')->nullable();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produksi_ternaks');
    }
};
