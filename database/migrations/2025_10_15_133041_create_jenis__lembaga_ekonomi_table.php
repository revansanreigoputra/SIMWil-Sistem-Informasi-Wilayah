<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jenis_lembaga_ekonomi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_lembaga_ekonomi_id')->constrained('kategori_lembaga_ekonomi')->onDelete('cascade');
            $table->string('nama');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jenis_lembaga_ekonomi');
    }
};
