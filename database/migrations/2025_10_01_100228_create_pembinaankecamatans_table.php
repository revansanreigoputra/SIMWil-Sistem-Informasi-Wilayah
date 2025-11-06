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
        Schema::create('pembinaankecamatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('fasilitasi_penyusunan_perdes')->nullable();
            $table->integer('fasilitasi_administrasi_tata_pemerintahan')->nullable();
            $table->integer('fasilitasi_pengelolaan_keuangan')->nullable();
            $table->integer('fasilitasi_urusan_otonomi')->nullable();
            $table->integer('fasilitasi_penerapan_peraturan')->nullable();
            $table->integer('fasilitasi_penyediaan_data')->nullable();
            $table->integer('fasilitasi_pelaksanaan_tugas')->nullable();
            $table->integer('fasilitasi_ketenteraman')->nullable();
            $table->integer('fasilitasi_penetapan_penguatan')->nullable();
            $table->integer('penanggulangan_kemiskinan_apbd')->nullable();
            $table->integer('fasilitasi_partisipasi_masyarakat')->nullable();
            $table->integer('fasilitasi_kerjasama_desa')->nullable();
            $table->integer('fasilitasi_program_pemberdayaan')->nullable();
            $table->integer('fasilitasi_kerjasama_lembaga')->nullable();
            $table->integer('fasilitasi_bantuan_teknis')->nullable();
            $table->integer('fasilitasi_koordinasi_unit_kerja')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembinaankecamatans');
    }
};
