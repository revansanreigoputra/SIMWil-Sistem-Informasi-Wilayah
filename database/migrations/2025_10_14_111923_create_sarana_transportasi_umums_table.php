<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sarana_transportasi_umums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_desa');
            $table->date('tanggal');
            $table->string('jenis_aset');       // dropdown isi cidemo/andong/dokar
            $table->integer('jumlah_pemilik')->nullable();
            $table->integer('jumlah_aset')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sarana_transportasi_umums');
    }
};
