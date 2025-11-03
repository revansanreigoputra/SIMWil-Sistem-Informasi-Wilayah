<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hasil_produksi_buahs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->foreignId('komoditas_buah_id')->constrained('komoditas_buahs')->onDelete('cascade');
            $table->double('luas_produksi')->default(0);
            $table->double('hasil_produksi')->default(0);

            $table->enum('dijual_langsung_konsumen', ['Ya', 'Tidak'])->default('Tidak');
            $table->enum('dijual_ke_pasar', ['Ya', 'Tidak'])->default('Tidak');
            $table->enum('dijual_melalui_kud', ['Ya', 'Tidak'])->default('Tidak');
            $table->enum('dijual_melalui_tengkulak', ['Ya', 'Tidak'])->default('Tidak');
            $table->enum('dijual_melalui_pengecer', ['Ya', 'Tidak'])->default('Tidak');
            $table->enum('dijual_ke_lumbung_desa', ['Ya', 'Tidak'])->default('Tidak');
            $table->enum('tidak_dijual', ['Ya', 'Tidak'])->default('Tidak');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hasil_produksi_buahs');
    }
};