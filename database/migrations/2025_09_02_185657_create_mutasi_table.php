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
        Schema::create('mutasi', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16);
            $table->string('nomor')->unique();
            $table->date('tanggal');
            $table->string('jenis');
            $table->string('penyebab')->nullable();
            $table->string('kecamatan');
            $table->string('desa');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutasi');
    }
};
