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
        Schema::create('pembinaankabupatens', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->enum('pelimpahan_tugas', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('pengaturan_kewenangan', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('pedoman_pelaksanaan_tugas', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('pedoman_penyusunan_peraturan', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('pedoman_penyusunan_perencanaan', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('kegiatan_fasilitasi_keberadaan', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('penetapan_pembiayaan', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('fasilitasi_pelaksanaan_pedoman', ['Ada', 'Tidak Ada'])->nullable();
            $table->integer('jumlah_kegiatan_pendidikan')->nullable();
            $table->integer('kegiatan_penanggulangan_kemiskinan')->nullable();
            $table->integer('kegiatan_penanganan_bencana')->nullable();
            $table->integer('kegiatan_peningkatan_pendapatan')->nullable();
            $table->enum('fasilitasi_penetapan_pedoman', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('kegiatan_fasilitasi_lanjutan', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('pedoman_pendataan', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('program_pemeliharaan_motivasi', ['Ada', 'Tidak Ada'])->nullable();    
            $table->enum('pemberian_penghargaan', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('pemberian_sanksi', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('pengawasan_keuangan', ['Ada', 'Tidak Ada'])->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembinaankabupatens');
    }
};
