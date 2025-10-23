<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kelembagaan_pendidikan_masyarakats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_desa')->constrained('desas')->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('perpustakaan_desa')->default(0);
            $table->integer('taman_bacaan')->default(0);
            $table->integer('perpustakaan_keliling')->default(0);
            $table->integer('sanggar_belajar')->default(0);
            $table->integer('kegiatan_lps')->default(0);
            $table->integer('kelompok_a')->default(0);
            $table->integer('peserta_a')->default(0);
            $table->integer('kelompok_b')->default(0);
            $table->integer('peserta_b')->default(0);
            $table->integer('kelompok_c')->default(0);
            $table->integer('peserta_c')->default(0);
            $table->integer('kursus_unit')->default(0);
            $table->integer('peserta_kursus')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelembagaan_pendidikan_masyarakats');
    }
};
