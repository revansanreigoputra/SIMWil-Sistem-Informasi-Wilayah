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
       Schema::create('perkembangan_penduduk', function (Blueprint $table) {
    $table->id();
    $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
    $table->date('tanggal');
    $table->integer('jumlah_laki_laki_tahun_ini');
    $table->integer('jumlah_perempuan_tahun_ini');
    $table->integer('jumlah_laki_laki_tahun_lalu');
    $table->integer('jumlah_perempuan_tahun_lalu');
    $table->integer('jumlah_kepala_keluarga_laki_laki_tahun_ini');
    $table->integer('jumlah_kepala_keluarga_perempuan_tahun_ini');
    $table->integer('jumlah_kepala_keluarga_laki_laki_tahun_lalu');
    $table->integer('jumlah_kepala_keluarga_perempuan_tahun_lalu');
    $table->timestamps();

});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perkembangan_penduduk');
    }
};