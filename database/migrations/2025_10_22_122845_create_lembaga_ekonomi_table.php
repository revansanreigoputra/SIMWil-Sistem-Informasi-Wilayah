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
        Schema::create('lembaga_ekonomi', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('kategori_lembaga_ekonomi_id')->constrained('kategori_lembaga_ekonomi')->onDelete('cascade');
            $table->foreignId('jenis_lembaga_ekonomi_id')->nullable()->constrained('jenis_lembaga_ekonomi')->onDelete('cascade');
            $table->integer('jumlah')->default(0); 
            $table->integer('jumlah_kegiatan')->default(0); 
            $table->integer('jumlah_pengurus')->default(0); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lembaga_ekonomi');
    }
};
