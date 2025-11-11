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
            $table->foreignId('desa_id')->constrained('desas')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('jumlah_warung_miras')->nullable();
            $table->integer('jumlah_penduduk_miras')->nullable();
            $table->integer('jumlah_kasus_mabuk_miras')->nullable();
            $table->integer('jumlah_pengedar_narkoba')->nullable();
            $table->integer('jumlah_penduduk_narkoba')->nullable();
            $table->integer('jumlah_kasus_teler_narkoba')->nullable();
            $table->integer('jumlah_kasus_kematian_narkoba')->nullable();
            $table->integer('jumlah_pelaku_miras_diadili')->nullable();
            $table->integer('jumlah_pelaku_narkoba_diadili')->nullable();
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
