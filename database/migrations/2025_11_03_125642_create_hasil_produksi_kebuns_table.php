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
        Schema::create('hasil_produksi_kebuns', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->foreignId('komoditas_perkebunan_id')->constrained('komoditas_perkebunan')->onDelete('cascade');
            $table->double('luas_perkebunan_swasta_negara', 15, 2)->default(0);
            $table->double('hasil_perkebunan_swasta_negara', 15, 2)->default(0);
            $table->double('luas_perkebunan_rakyat', 15, 2)->default(0);
            $table->double('hasil_perkebunan_rakyat', 15, 2)->default(0);
            $table->double('harga_lokal', 15, 2)->default(0);
            $table->double('nilai_produksi_tahun_ini', 15, 2)->default(0);
            $table->double('biaya_pemupukan', 15, 2)->default(0);
            $table->double('biaya_bibit', 15, 2)->default(0);
            $table->double('biaya_obat', 15, 2)->default(0);
            $table->double('biaya_lainnya', 15, 2)->default(0);
            $table->double('saldo_produksi', 15, 2)->default(0);

            // dropdown (ya/tidak)
            $table->enum('dijual_langsung_ke_konsumen', ['Ya', 'Tidak'])->default('Tidak');
            $table->enum('dijual_melalui_kud', ['Ya', 'Tidak'])->default('Tidak');
            $table->enum('dijual_melalui_tengkulak', ['Ya', 'Tidak'])->default('Tidak');
            $table->enum('dijual_melalui_pengecer', ['Ya', 'Tidak'])->default('Tidak');
            $table->enum('dijual_ke_lumbung_desa', ['Ya', 'Tidak'])->default('Tidak');
            $table->enum('tidak_dijual', ['Ya', 'Tidak'])->default('Tidak');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_produksi_kebuns');
    }
};