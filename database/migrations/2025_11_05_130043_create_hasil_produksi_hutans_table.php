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
        Schema::create('hasil_produksi_hutans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->foreignId('komoditas_hutan_id')->constrained('komoditas_hutan')->onDelete('cascade');
            $table->double('hasil_produksi', 15, 2)->default(0);
            $table->foreignId('satuan_produksi_kehutanan_id')->constrained('satuan_produksi_kehutanan')->onDelete('cascade');

            // dropdown (ya/tidak)
            $table->enum('dijual_langsung_ke_konsumen', ['Ya', 'Tidak'])->default('Tidak');
            $table->enum('dijual_ke_pasar', ['Ya', 'Tidak'])->default('Tidak');
            $table->enum('dijual_melalui_kud', ['Ya', 'Tidak'])->default('Tidak');
            $table->enum('dijual_melalui_tengkulak', ['Ya', 'Tidak'])->default('Tidak');
            $table->enum('dijual_melalui_pengecer', ['Ya', 'Tidak'])->default('Tidak');
            $table->enum('dijual_ke_lumbung_desa_kelurahan', ['Ya', 'Tidak'])->default('Tidak');
            $table->enum('tidak_dijual', ['Ya', 'Tidak'])->default('Tidak');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_produksi_hutans');
    }
};