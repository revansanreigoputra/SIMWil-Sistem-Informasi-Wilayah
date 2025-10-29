<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('klahans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->integer('memiliki_kurang_10_ha')->default(0);
            $table->integer('memiliki_10_50_ha')->default(0);
            $table->integer('memiliki_50_100_ha')->default(0);
            $table->integer('memiliki_lebih_100_ha')->default(0);
            $table->integer('jml_keluarga_memiliki_tanah')->default(0);
            $table->integer('jml_keluarga_tidak_memiliki_tanah')->default(0);
            $table->integer('jml_keluarga_petani_tanaman_pangan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('klahans');
    }
};