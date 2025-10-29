<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('kualitas_ibu_hamils');

        Schema::create('kualitas_ibu_hamils', function (Blueprint $table) {
            $table->id();

            // 🔹 Tambahkan kolom desa_id sebagai foreign key
            $table->unsignedBigInteger('desa_id')->nullable();
            $table->foreign('desa_id')->references('id')->on('desas')->onDelete('set null');

            $table->date('tanggal')->nullable();
            $table->integer('jumlah_ibu_hamil')->default(0);
            $table->integer('total_pemeriksaan')->default(0);
            $table->integer('jumlah_melahirkan')->default(0);
            $table->integer('jumlah_kematian_ibu')->default(0);
            $table->integer('jumlah_ibu_nifas_hidup')->default(0);
            $table->integer('periksa_posyandu')->default(0);
            $table->integer('periksa_puskesmas')->default(0);
            $table->integer('periksa_rumah_sakit')->default(0);
            $table->integer('periksa_dokter_praktek')->default(0);
            $table->integer('periksa_bidan_praktek')->default(0);
            $table->integer('periksa_dukun_terlatih')->default(0);
            $table->integer('jumlah_ibu_nifas')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kualitas_ibu_hamils');
    }
};
