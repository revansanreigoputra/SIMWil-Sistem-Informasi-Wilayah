<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perkembangan_pasangan_usia_subur_dan_kb', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->nullable()->constrained('desas')->onDelete('cascade');
            $table->date('tanggal')->nullable();

            // Pasangan usia subur
            $table->integer('remaja_putri_12_17')->nullable();
            $table->integer('perempuan_usia_subur_15_49')->nullable();
            $table->integer('wanita_kawin_muda_kurang_16')->nullable();
            $table->integer('pasangan_usia_subur')->nullable();

            // Keluarga berencana
            $table->integer('pengguna_kontrasepsi_suntik')->nullable();
            $table->integer('pengguna_kontrasepsi_spiral')->nullable();
            $table->integer('pengguna_kontrasepsi_kondom')->nullable();
            $table->integer('pengguna_kontrasepsi_pil')->nullable();
            $table->integer('pengguna_kontrasepsi_vasektomi')->nullable();
            $table->integer('pengguna_kontrasepsi_tubektomi')->nullable();
            $table->integer('pengguna_kb_alamiah')->nullable();
            $table->integer('pengguna_kb_tradisional')->nullable();
            $table->integer('pengguna_kontrasepsi_lainnya')->nullable();
            $table->integer('akseptor_kb')->nullable();
            $table->integer('pus_tidak_menggunakan_kb')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perkembangan_pasangan_usia_subur_dan_kb');
    }
};
