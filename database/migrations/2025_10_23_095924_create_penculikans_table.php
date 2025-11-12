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
        Schema::create('penculikans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_desa');
            $table->date('tanggal');
            $table->integer('jumlah_kasus_penculikan')->nullable();
            $table->integer('jumlah_kasus_korban_penduduk')->nullable();
            $table->integer('jumlah_kasus_pelaku_penduduk')->nullable();
            $table->integer('jumlah_kasus_diproses_hukum')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penculikans');
    }
};
