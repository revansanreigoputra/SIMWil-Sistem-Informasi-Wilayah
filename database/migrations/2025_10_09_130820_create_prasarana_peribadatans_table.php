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
        Schema::create('prasarana_peribadatans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('tempat_ibadah_id')->constrained('tempat_ibadahs')->onDelete('cascade');
            $table->integer('jumlah')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prasarana_peribadatans');
    }
};