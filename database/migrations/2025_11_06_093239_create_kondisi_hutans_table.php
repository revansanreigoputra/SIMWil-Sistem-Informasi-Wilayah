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
        Schema::create('kondisi_hutans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->foreignId('jenis_hutan_id')->constrained('jenis_hutan')->onDelete('cascade');
            $table->double('kondisi_baik', 15, 2)->default(0);
            $table->double('kondisi_buruk', 15, 2)->default(0);
            $table->double('jumlah_luas_hutan', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kondisi_hutans');
    }
};