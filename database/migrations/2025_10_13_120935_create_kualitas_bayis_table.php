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
        Schema::create('kualitas_bayis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('jumlah_keguguran_kandungan')->default(0);
            $table->integer('jumlah_bayi_lahir')->default(0);
            $table->integer('jumlah_bayi_lahir_hidup')->default(0);
            
            // Kolom baru/tambahan
            $table->integer('jumlah_bayi_lahir_mati')->default(0); 
            
            $table->integer('jumlah_bayi_mati_0_1_bulan')->default(0);
            $table->integer('jumlah_bayi_mati_1_12_bulan')->default(0);
            $table->integer('jumlah_bayi_lahir_berat_kurang_2_5_kg')->default(0);
            $table->integer('jumlah_bayi_0_5_tahun_hidup_disabilitas')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kualitas_bayis');
    }
};