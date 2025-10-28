<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pemilik_aset_ekonomi_lainnyas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_desa');
            $table->unsignedBigInteger('id_jenis_aset_lainnya');
            $table->date('tanggal');
            $table->integer('jumlah');
            $table->timestamps();

            // Relasi ke tabel desa dan jenis_aset_lainnyas
            $table->foreign('id_desa')->references('id')->on('desas')->onDelete('cascade');
            $table->foreign('id_jenis_aset_lainnya')->references('id')->on('jenis_aset_lainnyas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemilik_aset_ekonomi_lainnyas');
    }
};
