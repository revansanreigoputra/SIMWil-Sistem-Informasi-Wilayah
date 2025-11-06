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
        Schema::create('jenis_populasi_ternaks', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('jenis_ternak_id')->constrained('jenis_ternak')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('jumlah_pemilik');
            $table->integer('populasi');
            $table->enum('dijual_langsung_ke_konsumen', ['ya', 'tidak'])->default('tidak');
            $table->enum('dijual_ke_pasar_hewan', ['ya', 'tidak'])->default('tidak');
            $table->enum('dijual_melalui_kud', ['ya', 'tidak'])->default('tidak');
            $table->enum('dijual_melalui_tengkulak', ['ya', 'tidak'])->default('tidak');
            $table->enum('dijual_melalui_pengecer', ['ya', 'tidak'])->default('tidak');
            $table->enum('dijual_ke_lumbung_desa_kelurahan', ['ya', 'tidak'])->default('tidak');
            $table->enum('tidak_dijual', ['ya', 'tidak'])->default('tidak');
            $table->foreignId('desa_id')->constrained('desas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_populasi_ternaks');
    }
};
