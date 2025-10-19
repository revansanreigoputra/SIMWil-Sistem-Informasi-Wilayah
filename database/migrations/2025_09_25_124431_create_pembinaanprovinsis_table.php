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
        Schema::create('pembinaanprovinsis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_desa');
            $table->date('tanggal');
            $table->enum('pedoman_pelaksanaan_tugas', ['Ada', 'Tidak Ada']);
            $table->enum('pedoman_bantuan_keuangan', ['Ada', 'Tidak Ada']);
            $table->enum('kegiatan_fasilitasi_keberadaan', ['Ada', 'Tidak Ada']);
            $table->enum('fasilitasi_pelaksanaan_pedoman', ['Ada', 'Tidak Ada']);
            $table->integer('jumlah_kegiatan_pendidikan')->nullable();
            $table->integer('kegiatan_penanggulangan_kemiskinan')->nullable();
            $table->integer('kegiatan_penanganan_bencana')->nullable();
            $table->integer('kegiatan_peningkatan_pendapatan')->nullable();
            $table->integer('kegiatan_penyediaan_sarana')->nullable();
            $table->integer('kegiatan_pemanfaatan_sda')->nullable();
            $table->integer('kegiatan_pengembangan_sosial')->nullable();
            $table->integer('pedoman_pendataan')->nullable();
            $table->integer('pemberian_sanksi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembinaanprovinsis');
    }
};
