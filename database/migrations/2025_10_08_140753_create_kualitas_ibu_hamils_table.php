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
        Schema::create('kualitas_ibu_hamils', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable();
            $table->integer('jumlah_ibu_hamil')->default(0);
            $table->integer('total_pemeriksaan')->default(0);
            $table->integer('jumlah_melahirkan')->default(0);
            $table->integer('jumlah_kematian_ibu')->default(0);
            $table->integer('jumlah_ibu_nifas_hidup')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kualitas_ibu_hamils');
    }
};
