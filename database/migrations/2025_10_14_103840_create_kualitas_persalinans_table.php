<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('kualitas_persalinans');

        Schema::create('kualitas_persalinans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable();

            // Kolom utama
            $table->integer('persalinan_rumah_sakit_umum')->nullable();
            $table->integer('persalinan_puskesmas')->nullable();
            $table->integer('persalinan_praktek_bidan')->nullable();
            $table->integer('total_persalinan')->nullable();

            // Kolom tambahan
            $table->integer('persalinan_rumah_bersalin')->nullable();
            $table->integer('persalinan_polindes')->nullable();
            $table->integer('persalinan_balai_kesehatan_ibu_anak')->nullable();
            $table->integer('persalinan_praktek_dokter')->nullable();
            $table->integer('rumah_sendiri')->nullable();
            $table->integer('rumah_dukun')->nullable();

            // Kolom penolong
            $table->integer('ditolong_dokter')->nullable();
            $table->integer('ditolong_bidan')->nullable();
            $table->integer('ditolong_perawat')->nullable();
            $table->integer('ditolong_dukun_bersalin')->nullable();
            $table->integer('ditolong_keluarga')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kualitas_persalinans');
    }
};
