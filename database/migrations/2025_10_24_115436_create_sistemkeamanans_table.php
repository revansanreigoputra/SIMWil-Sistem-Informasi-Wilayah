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
        Schema::create('sistemkeamanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_desa');
            $table->date('tanggal');
            $table->enum('organisasi_siskamling', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('organisasi_pertahanan_sipil', ['Ada', 'Tidak Ada'])->nullable();
            $table->integer('jumlah_rt_atau_pos_ronda')->nullable();
            $table->integer('jumlah_anggota_hansip_dan_linmas')->nullable();
            $table->enum('jadwal_kegiatan_siskamling', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('buku_anggota_hansip_linmas', ['Ada', 'Tidak Ada'])->nullable();
            $table->integer('jumlah_kelompok_satpam_swasta')->nullable();
            $table->integer('jumlah_pembinaan_siskamling')->nullable();
            $table->integer('jumlah_pos_jaga_induk_desa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sistemkeamanans');
    }
};
