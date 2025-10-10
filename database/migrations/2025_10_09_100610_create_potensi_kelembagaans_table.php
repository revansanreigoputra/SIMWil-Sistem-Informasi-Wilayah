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
        Schema::create('potensi_kelembagaans', function (Blueprint $table) {
            $table->id(); 
            $table->date('tanggal_data');
            $table->string('dasar_hukum_pembentukan')->nullable();
            $table->string('dasar_hukum_pembentukan_bpd')->nullable();
            $table->unsignedSmallInteger('jumlah_aparat_pemerintah');
            $table->unsignedSmallInteger('jumlah_perangkat_desa');
            $table->unsignedSmallInteger('jumlah_staf');
            $table->unsignedSmallInteger('jumlah_dusun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potensi_kelembagaans');
    }
};
