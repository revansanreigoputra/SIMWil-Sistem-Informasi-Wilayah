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
        Schema::create('berbangsas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal');

            // Data kegiatan nilai ideologi dan kebangsaan
            $table->integer('kegiatan_pemantapan_pancasila')->nullable();
            $table->integer('jumlah_kegiatan_pemantapan_pancasila')->nullable();
            $table->integer('jenis_kegiatan_bhineka_tunggal_ika')->nullable();
            $table->integer('jumlah_kegiatan_bhineka_tunggal_ika')->nullable();
            $table->integer('jenis_kegiatan_pemantapan_kesatuan_bangsa')->nullable();

            // Data kasus perbatasan
            $table->integer('kasus_desa_minta_suaka')->nullable();
            $table->integer('warga_melintas_resmi')->nullable();
            $table->integer('warga_melintas_tidak_resmi')->nullable();
            $table->integer('kasus_pertempuran_antar_kelompok')->nullable();
            $table->integer('serangan_terhadap_fasilitas')->nullable();
            $table->integer('kasus_merongrong_nkri')->nullable();
            $table->integer('korban_manusia')->nullable();
            $table->integer('masalah_ketenagakerjaan')->nullable();
            $table->integer('kasus_kejahatan_perbatasan')->nullable();
            $table->integer('sengketa_perbatasan_desa')->nullable();
            $table->integer('sengketa_perbatasan_antar_daerah')->nullable();
            $table->integer('kasus_diplomatik')->nullable();
            $table->integer('kasus_disintegrasi')->nullable();
            $table->integer('kasus_penangkapan')->nullable();
            $table->integer('kasus_nelayan_petani')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berbangsas');
    }
};
