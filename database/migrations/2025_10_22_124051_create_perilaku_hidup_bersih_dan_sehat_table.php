<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perilaku_hidup_bersih_dan_sehat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->date('tanggal');

            $table->integer('keluarga_wc_sehat')->nullable();
            $table->integer('keluarga_wc_tidak_standar')->nullable();
            $table->integer('keluarga_buang_air_sungai')->nullable();
            $table->integer('keluarga_mck_umum')->nullable();

            $table->string('makan_1x')->nullable();
            $table->string('makan_2x')->nullable();
            $table->string('makan_3x')->nullable();
            $table->string('makan_lebih_3x')->nullable();
            $table->string('belum_tentu_makan')->nullable();

            $table->string('dukun_terlatih')->nullable();
            $table->string('tenaga_kesehatan')->nullable();
            $table->string('obat_tradisional_dukun')->nullable();
            $table->string('paranormal')->nullable();
            $table->string('obat_keluarga_sendiri')->nullable();
            $table->string('tidak_diobati')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perilaku_hidup_bersih_dan_sehat');
    }
};
