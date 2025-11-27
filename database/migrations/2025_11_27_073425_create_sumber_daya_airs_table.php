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
        Schema::create('sumber_daya_airs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('jenis_potensi_air_id')->constrained('jenis_potensi_air')->onDelete('cascade');
            $table->integer('jumlah_luas')->default(0);
            $table->enum('debit_volume', ['kecil', 'sedang', 'besar']);
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sumber_daya_airs');
    }
};
