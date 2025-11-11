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
        Schema::create('perjudians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('jumlah_penduduk_berjudi')->nullable();
            $table->string('jenis_perjudian')->nullable();
            $table->integer('jumlah_kasus_penipuan_penggelapan')->nullable();
            $table->integer('jumlah_kasus_sengketa_warisan_jualbeli_utangpiutang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perjudians');
    }
};
