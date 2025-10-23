<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pe_rasio_guru', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_desa');
            $table->date('tanggal');
            $table->integer('guru_tk');
            $table->integer('siswa_tk');
            $table->integer('guru_sd');
            $table->integer('siswa_sd');
            $table->integer('guru_sltp');
            $table->integer('siswa_sltp');
            $table->integer('guru_slta');
            $table->integer('siswa_slta');
            $table->integer('guru_slb');
            $table->integer('siswa_slb');
            $table->timestamps();

            $table->foreign('id_desa')->references('id')->on('desas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pe_rasio_guru');
    }
};
