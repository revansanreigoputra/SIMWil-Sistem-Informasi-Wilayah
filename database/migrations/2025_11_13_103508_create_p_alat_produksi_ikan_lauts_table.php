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
        Schema::create('p_alat_produksi_ikan_lauts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->foreignId('alat_produksi_ikan_laut_id')->constrained('alat_produksi_ikan_laut')->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('jumlah_alat_luas')->default(0);
            $table->integer('hasil_produksi')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_alat_produksi_ikan_lauts');
    }
};
