<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('apotik_hidups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->foreignId('komoditas_obat_id')->constrained('komoditas_obat')->onDelete('cascade');
            $table->date('tanggal');
            $table->decimal('luas_produksi', 10, 2)->default(0);
            $table->decimal('hasil_produksi', 10, 2)->default(0);
            $table->decimal('jumlah_produksi', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Batalkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('apotik_hidups');
    }
};