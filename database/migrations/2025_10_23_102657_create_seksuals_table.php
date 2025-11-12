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
        Schema::create('seksuals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_desa');
            $table->date('tanggal');
            $table->integer('jumlah_kasus_perkosaan')->nullable();
            $table->integer('jumlah_kasus_perkosaan_anak')->nullable();
            $table->integer('jumlah_kasus_hamil_luar_nikah_hukum_negara')->nullable();
            $table->integer('jumlah_kasus_hamil_luar_nikah_hukum_adat')->nullable();
            $table->integer('jumlah_tempat_penampungan_pekerja_seks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seksuals');
    }
};
