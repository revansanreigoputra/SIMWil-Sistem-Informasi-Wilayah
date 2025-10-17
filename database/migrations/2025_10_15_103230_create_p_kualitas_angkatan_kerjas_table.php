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
        Schema::create('p_kualitas_angkatan_kerjas', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('angkatan_kerja');
            $table->integer('jumlah_laki_laki');
            $table->integer('jumlah_perempuan');
            $table->integer('jumlah_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_kualitas_angkatan_kerjas');
    }
};
