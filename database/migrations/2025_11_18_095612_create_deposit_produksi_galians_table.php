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
        Schema::create('deposit_produksi_galians', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('komoditas_galian_id')->constrained('komoditas_galians')->onDelete('cascade');
            $table->enum('status', ['ada tapi belum produktif', 'ada dan sudah produktif']);
            $table->enum('hasil_produksi', ['kecil', 'sedang', 'besar']);
            $table->enum('dijual_langsung_ke_konsumen', ['ya', 'tidak'])->default('tidak');
            $table->enum('dijual_melalui_kud', ['ya', 'tidak'])->default('tidak');
            $table->enum('dijual_melalui_tengkulak', ['ya', 'tidak'])->default('tidak');
            $table->enum('dijual_melalui_pengecer', ['ya', 'tidak'])->default('tidak');
            $table->enum('dijual_ke_perusahaan', ['ya', 'tidak'])->default('tidak');
            $table->enum('dijual_ke_lumbung_desa_kelurahan', ['ya', 'tidak'])->default('tidak');
            $table->enum('tidak_dijual', ['ya', 'tidak'])->default('tidak');
            $table->enum('kepemilikan', ['pemerintah', 'swasta', 'perorangan', 'adat', 'lainnya']);
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposit_produksi_galians');
    }
};
