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
            $table->unsignedBigInteger('id_kec')->nullable();   // bisa dihapus kalau ga dipakai
            $table->unsignedBigInteger('id_desa')->nullable();  // bisa dihapus kalau ga dipakai
            $table->date('tanggal');
            $table->unsignedBigInteger('id_komoditas_sektor')->nullable(); // opsional
            $table->integer('kk');
            $table->integer('anggota');
            $table->integer('buruh');
            $table->integer('anggota_buruh');
            $table->bigInteger('pendapatan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menurut_sektor_usahas');
    }
};
