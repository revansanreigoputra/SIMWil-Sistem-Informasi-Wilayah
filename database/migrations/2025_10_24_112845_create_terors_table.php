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
        Schema::create('terors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('jumlah_kasus_intimidasi_dalam_desa')->nullable();
            $table->integer('jumlah_kasus_intimidasi_luar_desa')->nullable();
            $table->integer('jumlah_kasus_selebaran_gelap')->nullable();
            $table->integer('jumlah_kasus_terorisme')->nullable();
            $table->integer('jumlah_kasus_hasutan_pemaksaan')->nullable();
            $table->integer('jumlah_penyelesaian_kasus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terors');
    }
};
