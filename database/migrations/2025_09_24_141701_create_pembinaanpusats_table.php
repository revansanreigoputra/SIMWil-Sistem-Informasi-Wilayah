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
        Schema::create('pembinaanpusats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_desa');
            $table->date('tanggal');
            $table->enum('pedoman_pelaksanaan_urusan', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('pedoman_bantuan_pembiayaan', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('pedoman_administrasi', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('pedoman_tanda_jabatan', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('pedoman_pendidikan_pelatihan', ['Ada', 'Tidak Ada'])->nullable();
            $table->integer('jumlah_bimbingan')->nullable();
            $table->integer('jumlah_kegiatan_pendidikan')->nullable();
            $table->integer('jumlah_penelitian_pengkajian')->nullable();
            $table->integer('jumlah_kegiatan_terkait_apbn')->nullable();
            $table->integer('jumlah_penghargaan')->nullable();
            $table->integer('jumlah_sanksi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembinaanpusats');
    }
};
