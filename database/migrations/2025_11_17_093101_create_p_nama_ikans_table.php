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
        Schema::create('p_nama_ikans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->foreignId('nama_ikan_id')->constrained('nama_ikan')->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('hasil_produksi')->default(0);
            $table->integer('harga_jual')->default(0);
            $table->integer('nilai_produksi')->default(0);
            $table->integer('nilai_bahan_baku')->default(0);
            $table->integer('nilai_bahan_penolong')->default(0);
            $table->integer('biaya_antara_yang_dihabiskan')->default(0);
            $table->integer('saldo_produksi')->default(0);
            $table->integer('jumlah_jenis_usaha_perikanan')->default(0);
            $table->enum('dijual_langsung_ke_konsumen', ['ya', 'tidak'])->default('tidak');
            $table->enum('dijual_langsung_ke_pasar', ['ya', 'tidak'])->default('tidak');
            $table->enum('dijual_melalui_kud', ['ya', 'tidak'])->default('tidak');
            $table->enum('dijual_melalui_tengkulak', ['ya', 'tidak'])->default('tidak');
            $table->enum('dijual_melalui_pengecer', ['ya', 'tidak'])->default('tidak');
            $table->enum('dijual_ke_lumbung_desa_kelurahan', ['ya', 'tidak'])->default('tidak');
            $table->enum('tidak_dijual', ['ya', 'tidak'])->default('tidak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_nama_ikans');
    }
};
