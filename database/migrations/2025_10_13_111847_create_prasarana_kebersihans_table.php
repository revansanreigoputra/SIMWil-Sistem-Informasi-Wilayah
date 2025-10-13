<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prasarana_kebersihans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('tps_lokasi')->nullable(); // Tempat Pembuangan Sementara
            $table->string('tpa_lokasi')->nullable(); // Tempat Pembuangan Akhir
            $table->string('alat_penghancur')->nullable();
            $table->integer('gerobak_sampah')->default(0);
            $table->integer('tong_sampah')->default(0);
            $table->integer('truk_pengangkut')->default(0);
            $table->integer('satgas_kebersihan')->default(0); // kelompok
            $table->integer('anggota_satgas')->default(0);
            $table->integer('pemulung')->default(0);
            $table->string('tempat_pengelolaan_sampah')->nullable();
            $table->enum('pengelolaan_sampah_rt', ['pemerintah', 'perorangan', 'swadaya'])->nullable();
            $table->string('pengelolaan_sampah_lainnya')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prasarana_kebersihans');
    }
};