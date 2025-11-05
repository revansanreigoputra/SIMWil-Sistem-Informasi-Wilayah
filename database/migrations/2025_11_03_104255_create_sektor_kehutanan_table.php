<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sektor_kehutanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('pengumpul_hasil_hutan')->nullable();
            $table->integer('pemilik_usaha_hasil_hutan')->nullable();
            $table->integer('buruh_usaha_hasil_hutan')->nullable();
            $table->integer('jumlah')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sektor_kehutanan');
    }
};
