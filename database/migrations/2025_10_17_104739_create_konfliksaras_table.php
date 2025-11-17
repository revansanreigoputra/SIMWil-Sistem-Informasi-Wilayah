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
        Schema::create('konfliksaras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('kasus_konflik_tahun_ini')->nullable();
            $table->integer('kasus_konflik_sara_tahun_ini')->nullable();
            $table->integer('kasus_pertengkaran_tetangga')->nullable();
            $table->integer('kasus_pertengkaran_rt_rw')->nullable();
            $table->integer('konflik_pendatang_dan_asli')->nullable();
            $table->integer('konflik_kelompok_desa_kelurahan_lain')->nullable();
            $table->integer('konflik_dengan_pemerintah')->nullable();
            $table->integer('kerugian_material_dengan_pemerintah')->nullable();
            $table->integer('korban_jiwa_dengan_pemerintah')->nullable();
            $table->integer('konflik_dengan_perusahaan')->nullable();
            $table->integer('korban_jiwa_dengan_perusahaan')->nullable();
            $table->integer('kerugian_material_dengan_perusahaan')->nullable();
            $table->integer('konflik_dengan_lembaga_politik')->nullable();
            $table->integer('korban_jiwa_dengan_lembaga_politik')->nullable();
            $table->integer('kerugian_material_dengan_lembaga_politik')->nullable();
            $table->integer('prasarana_rusak_konflik_sara')->nullable();
            $table->integer('rumah_rusak_konflik_sara')->nullable();
            $table->integer('korban_luka_konflik_sara')->nullable();
            $table->integer('korban_meninggal_konflik_sara')->nullable();
            $table->integer('anak_janda_konflik_sara')->nullable();
            $table->integer('anak_yatim_konflik_sara')->nullable();
            $table->integer('pelaku_diadili')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konfliksaras');
    }
};
