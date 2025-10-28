<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('topografis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->date('tanggal');

            // Bentangan Wilayah
            $table->decimal('dataran_rendah', 10, 2)->default(0);
            $table->decimal('berbukit_bukit', 10, 2)->default(0);
            $table->decimal('dataran', 10, 2)->default(0);
            $table->decimal('lereng_gunung', 10, 2)->default(0);
            $table->decimal('tepi_pantai_pesisir', 10, 2)->default(0);
            $table->decimal('kawasan_rawa', 10, 2)->default(0);
            $table->decimal('kawasan_gambut', 10, 2)->default(0);
            $table->decimal('aliran_sungai', 10, 2)->default(0);
            $table->decimal('bantaran_sungai', 10, 2)->default(0);
            $table->decimal('lain_lain', 10, 2)->default(0);

            // Letak Wilayah
            $table->decimal('kawasan_perkantoran', 10, 2)->default(0);
            $table->decimal('kawasan_pertokoan', 10, 2)->default(0);
            $table->decimal('kawasan_campuran', 10, 2)->default(0);
            $table->decimal('kawasan_industri', 10, 2)->default(0);
            $table->decimal('kepulauan', 10, 2)->default(0);
            $table->decimal('pantai_pesisir', 10, 2)->default(0);
            $table->decimal('kawasan_hutan', 10, 2)->default(0);
            $table->decimal('taman_suaka', 10, 2)->default(0);
            $table->decimal('kawasan_wisata', 10, 2)->default(0);
            $table->decimal('perbatasan_negara', 10, 2)->default(0);
            $table->decimal('perbatasan_provinsi', 10, 2)->default(0);
            $table->decimal('perbatasan_kabupaten', 10, 2)->default(0);
            $table->decimal('perbatasan_kecamatan', 10, 2)->default(0);
            $table->decimal('das_bantaran_sungai', 10, 2)->default(0);
            $table->decimal('rawan_banjir', 10, 2)->default(0);
            $table->decimal('bebas_banjir', 10, 2)->default(0);
            $table->decimal('potensial_tsunami', 10, 2)->default(0);
            $table->decimal('rawan_gempa', 10, 2)->default(0);

            // Orbitasi
            // Ke Kecamatan
            $table->decimal('jarak_ke_kecamatan', 8, 2)->default(0);
            $table->decimal('lama_bermotor_kecamatan', 5, 2)->default(0);
            $table->decimal('lama_non_bermotor_kecamatan', 5, 2)->default(0);
            $table->integer('kendaraan_umum_kecamatan')->default(0);

            // Ke Kabupaten
            $table->decimal('jarak_ke_kabupaten', 8, 2)->default(0);
            $table->decimal('lama_bermotor_kabupaten', 5, 2)->default(0);
            $table->decimal('lama_non_bermotor_kabupaten', 5, 2)->default(0);
            $table->integer('kendaraan_umum_kabupaten')->default(0);

            // Ke Provinsi
            $table->decimal('jarak_ke_provinsi', 8, 2)->default(0);
            $table->decimal('lama_bermotor_provinsi', 5, 2)->default(0);
            $table->decimal('lama_non_bermotor_provinsi', 5, 2)->default(0);
            $table->integer('kendaraan_umum_provinsi')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('topografis');
    }
};