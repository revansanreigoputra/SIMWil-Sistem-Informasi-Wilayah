<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kepemilikan_lahan_buahs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->double('memiliki_kurang_10')->default(0);
            $table->double('memiliki_10_50')->default(0);
            $table->double('memiliki_50_100')->default(0);
            $table->double('memiliki_100_500')->default(0);
            $table->double('memiliki_500_1000')->default(0);
            $table->double('memiliki_lebih_1000')->default(0);
            $table->double('jumlah_keluarga_memiliki_tanah')->default(0);
            $table->double('jumlah_keluarga_tidak_memiliki_tanah')->default(0);
            $table->double('jumlah_keluarga_petani_buah')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kepemilikan_lahan_buahs');
    }
};