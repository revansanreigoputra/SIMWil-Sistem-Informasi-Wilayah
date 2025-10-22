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
        Schema::create('miras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_desa'); // relasi ke tabel desa jika ada
            $table->date('tanggal');
            $table->integer('jumlah_warung_miras')->default(0);
            $table->integer('jumlah_penduduk_miras')->default(0);
            $table->integer('jumlah_kasus_mabuk_miras')->default(0);
            $table->integer('jumlah_pengedar_narkoba')->default(0);
            $table->integer('jumlah_penduduk_narkoba')->default(0);
            $table->integer('jumlah_kasus_teler_narkoba')->default(0);
            $table->integer('jumlah_kasus_kematian_narkoba')->default(0);
            $table->integer('jumlah_pelaku_miras_diadili')->default(0);
            $table->integer('jumlah_pelaku_narkoba_diadili')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('miras');
    }
};
