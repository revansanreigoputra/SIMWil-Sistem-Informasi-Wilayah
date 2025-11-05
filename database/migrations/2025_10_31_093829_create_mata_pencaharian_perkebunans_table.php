<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mata_pencaharian_perkebunans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('karyawan_perusahaan_perkebunan')->nullable();
            $table->integer('pemilik_usaha_perkebunan')->nullable();
            $table->integer('buruh_perkebunan')->nullable();
            $table->integer('jumlah')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mata_pencaharian_perkebunans');
    }
};
