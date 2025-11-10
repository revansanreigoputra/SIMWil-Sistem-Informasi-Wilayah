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
        Schema::create('gotongroyongs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('jumlah_kelompok_arisan')->nullable();
            $table->integer('jumlah_penduduk_orang_tua_asuh')->nullable();
            $table->enum('dana_sehat',['Ada', 'Tidak Ada'])->nullable();
            $table->enum('pembangunan_rumah',['Ada', 'Tidak Ada'])->nullable();
            $table->enum('pengolahan_tanah',['Ada', 'Tidak Ada'])->nullable();
            $table->enum('pembiayaan_pendidikan',['Ada', 'Tidak Ada'])->nullable();
            $table->enum('pemeliharaan_fasilitas_umum',['Ada', 'Tidak Ada'])->nullable();
            $table->enum('pemberian_modal_usaha',['Ada', 'Tidak Ada'])->nullable();
            $table->enum('pengerjaan_sawah_kebun',['Ada', 'Tidak Ada'])->nullable();
            $table->enum('penangkapan_ikan_usaha',['Ada', 'Tidak Ada'])->nullable();
            $table->enum('menjaga_ketertiban',['Ada', 'Tidak Ada'])->nullable();
            $table->enum('peristiwa_kematian',['Ada', 'Tidak Ada'])->nullable();
            $table->enum('menjaga_kebersihan_desa',['Ada', 'Tidak Ada'])->nullable();
            $table->enum('membangun_jalan_irigasi',['Ada', 'Tidak Ada'])->nullable();
            $table->enum('pemberantasan_sarang_nyamuk',['Ada', 'Tidak Ada'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gotongroyongs');
    }
};
