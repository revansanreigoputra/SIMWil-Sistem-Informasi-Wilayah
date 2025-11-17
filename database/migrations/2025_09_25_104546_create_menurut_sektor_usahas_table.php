<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menurut_sektor_usahas', function (Blueprint $table) {
            $table->id();

            // Relasi
            $table->unsignedBigInteger('id_desa');
            $table->unsignedBigInteger('sektor_id');

            // Kolom yang WAJIB ADA
            $table->date('tanggal');
            $table->integer('kk')->default(0);
            $table->integer('anggota')->default(0);
            $table->integer('buruh')->default(0);
            $table->integer('anggota_buruh')->default(0);
            $table->integer('pendapatan')->default(0);

            $table->timestamps();

            $table->foreign('sektor_id')
                ->references('id')
                ->on('komoditas_sektor')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menurut_sektor_usahas');
    }
};
