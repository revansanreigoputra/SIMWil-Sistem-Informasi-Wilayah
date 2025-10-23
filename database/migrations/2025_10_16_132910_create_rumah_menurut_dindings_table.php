<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rumah_menurut_dindings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kec')->default(1); // kecamatan default/fix
            $table->unsignedBigInteger('id_desa'); // foreign key ke tabel desas
            $table->date('tanggal');
            $table->unsignedBigInteger('id_aset_dinding'); // foreign key ke tabel jenis_dindings
            $table->integer('jumlah')->default(0);
            $table->timestamps();

            $table->foreign('id_desa')->references('id')->on('desas')->onDelete('cascade');
            $table->foreign('id_aset_dinding')->references('id')->on('jenis_dindings')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rumah_menurut_dindings');
    }
};
