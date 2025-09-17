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
        Schema::create('transportasi_darats', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');

            // Enum kategori
            $table->enum('kategori', ['jalan_desa', 'jalan_kabupaten']);

            // Enum jenis sarana prasarana
            $table->enum('jenis_sarana_prasarana', ['panjang_jalan_tanah', 'panjang_jalan_aspal']);

            $table->integer('kondisi_baik')->default(0);
            $table->integer('kondisi_rusak')->default(0);
            $table->integer('jumlah')->default(0); // Km/Unit
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportasi_darats');
    }
};