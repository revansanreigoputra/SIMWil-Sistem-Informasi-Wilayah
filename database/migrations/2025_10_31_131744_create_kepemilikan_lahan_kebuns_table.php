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
        Schema::create('kepemilikan_lahan_kebuns', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->integer('memiliki_kurang_dari_5_ha')->default(0);
            $table->integer('memiliki_10_50_ha')->default(0);
            $table->integer('memiliki_50_100_ha')->default(0);
            $table->integer('memiliki_100_500_ha')->default(0);
            $table->integer('memiliki_500_1000_ha')->default(0);
            $table->integer('memiliki_lebih_dari_1000_ha')->default(0);
            $table->integer('jumlah_keluarga_memiliki_tanah')->default(0);
            $table->integer('jumlah_keluarga_tidak_memiliki_tanah')->default(0);
            $table->integer('jumlah_keluarga_petani_perkebunan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Batalkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepemilikan_lahan_kebuns');
    }
};