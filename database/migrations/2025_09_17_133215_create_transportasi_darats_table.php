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
        Schema::create('transportasi_darats', function (Blueprint $table) {
            $table->id();

            $table->foreignId('desa_id')->constrained('desas')->onUpdate('cascade')->onDelete('cascade');

            $table->date('tanggal');

            $table->foreignId('kategori_prasarana_transportasi_darat_id');
            $table->foreign('kategori_prasarana_transportasi_darat_id', 'td_kategori_id_foreign')->references('id')->on('kategori_prasarana_transportasi_darat')->onUpdate('cascade')->onDelete('cascade');
            
            $table->foreignId('jenis_prasarana_transportasi_darat_id');
            $table->foreign('jenis_prasarana_transportasi_darat_id', 'td_jenis_id_foreign')->references('id')->on('jenis_prasarana_transportasi_darat')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('kondisi_baik')->default(0);
            $table->integer('kondisi_rusak')->default(0);
            $table->integer('jumlah')->default(0); // Km/Unit
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportasi_darats');
    }
};