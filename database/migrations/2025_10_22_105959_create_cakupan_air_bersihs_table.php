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
        Schema::create('cakupan_air_bersih', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade'); // Foreign key ke tabel 'desas'
            $table->date('tanggal');
            $table->unsignedInteger('sumur_gali')->nullable()->default(0)->comment('Jumlah keluarga menggunakan sumur gali');
            $table->unsignedInteger('pelanggan_pam')->nullable()->default(0)->comment('Jumlah keluarga pelanggan PAM');
            $table->unsignedInteger('penampung_air_hujan')->nullable()->default(0)->comment('Jumlah keluarga menggunakan Penampung Air Hujan');
            $table->unsignedInteger('sumur_pompa')->nullable()->default(0)->comment('Jumlah keluarga menggunakan sumur pompa');
            $table->unsignedInteger('perpipaan_air_kran')->nullable()->default(0)->comment('Jumlah keluarga menggunakan perpipaan air kran');
            $table->unsignedInteger('hidran_umum')->nullable()->default(0)->comment('Jumlah keluarga menggunakan hidran umum');
            $table->unsignedInteger('air_sungai')->nullable()->default(0)->comment('Jumlah keluarga menggunakan air sungai');
            $table->unsignedInteger('embung')->nullable()->default(0)->comment('Jumlah keluarga menggunakan embung');
            $table->unsignedInteger('mata_air')->nullable()->default(0)->comment('Jumlah keluarga menggunakan mata air');
            $table->unsignedInteger('tidak_akses_air_laut')->nullable()->default(0)->comment('Jumlah keluarga yang tidak mendapat akses air minum dari air laut');
            $table->unsignedInteger('tidak_akses_sumber_lain')->nullable()->default(0)->comment('Jumlah keluarga yang tidak mendapat akses air minum dari sumber di atas');
            $table->unsignedInteger('total_keluarga')->nullable()->default(0); // Total jumlah keluarga (Tambahan dari form create)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cakupan_air_bersih');
    }
};