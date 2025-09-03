<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_keluargas', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk')->unique(); // Nomor Kartu Keluarga
            $table->string('kepala_keluarga'); // Nama Kepala Keluarga
            $table->string('alamat');          // Alamat
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_keluargas');
    }
};
