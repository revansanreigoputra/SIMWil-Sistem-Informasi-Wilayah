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
        Schema::create('lembaga_adats', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');

            // Lembaga Adat
            $table->boolean('pemangku_adat')->default(0);
            $table->boolean('kepengurusan_adat')->default(0);

            // Simbol Adat
            $table->boolean('rumah_adat')->default(0);
            $table->boolean('barang_pusaka')->default(0);
            $table->boolean('naskah_naskah')->default(0);
            $table->boolean('lainnya')->default(0);

            // Kegiatan Adat
            $table->boolean('musyawarah_adat')->default(0);
            $table->boolean('sanksi_adat')->default(0);
            $table->boolean('upacara_adat_perkawinan')->default(0);
            $table->boolean('upacara_adat_kematian')->default(0);
            $table->boolean('upacara_adat_kelahiran')->default(0);
            $table->boolean('upacara_adat_bercocok_tanam')->default(0);
            $table->boolean('upacara_adat_perikanan_laut')->default(0);
            $table->boolean('upacara_adat_bidang_kehutanan')->default(0);
            $table->boolean('upacara_adat_pengelolaan_sda')->default(0);
            $table->boolean('upacara_adat_pembangunan_rumah')->default(0);
            $table->boolean('upacara_adat_penyelesaian_masalah')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lembaga_adats');
    }
};