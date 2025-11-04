<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sektor_perdagangans', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('desa_id')->nullable();
            $table->foreign('desa_id')->references('id')->on('desas')->onDelete('cascade');

            $table->date('tanggal')->nullable();
            $table->integer('karyawan_perdagangan_hasil_bumi')->nullable();
            $table->integer('pengusaha_perdagangan_hasil_bumi')->nullable();
            $table->integer('buruh_perdagangan_hasil_bumi')->nullable();
            $table->integer('jumlah')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sektor_perdagangans');
    }
};
