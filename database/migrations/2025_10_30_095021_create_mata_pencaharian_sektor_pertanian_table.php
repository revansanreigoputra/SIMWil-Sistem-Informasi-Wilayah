<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mata_pencaharian_sektor_pertanian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('petani')->nullable()->default(0);
            $table->integer('pemilik_usaha_tani')->nullable()->default(0);
            $table->integer('buruh_tani')->nullable()->default(0);
            $table->integer('jumlah')->nullable()->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mata_pencaharian_sektor_pertanian');
    }
};
