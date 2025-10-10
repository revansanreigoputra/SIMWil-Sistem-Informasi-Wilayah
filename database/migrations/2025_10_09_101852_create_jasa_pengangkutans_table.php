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
        Schema::create('jasa_pengangkutans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('kategori');
            $table->string('jenis_angkutan');
            $table->integer('jumlah_unit')->default(0);
            $table->integer('jumlah_pemilik')->default(0);
            $table->integer('kapasitas')->default(0);
            $table->integer('tenaga_kerja')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jasa_pengangkutans');
    }
};
