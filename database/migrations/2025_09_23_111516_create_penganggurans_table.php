<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penganggurans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_desa'); // hanya desa
            $table->date('tanggal');
            $table->integer('angkatan_kerja');
            $table->integer('masih_sekolah');
            $table->integer('ibu_rumah_tangga');
            $table->integer('bekerja_penuh');
            $table->integer('bekerja_tidak_tentu');
            $table->integer('tidak_bekerja');
            $table->integer('bekerja');
            $table->timestamps();

            $table->foreign('id_desa')->references('id')->on('desas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penganggurans');
    }
};
