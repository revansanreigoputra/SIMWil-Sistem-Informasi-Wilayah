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
        Schema::create('p_sumber_air_panas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('jenis_sumber_air_panas_id')->constrained('sumber_air_panas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->date('tanggal');
            $table->integer('jumlah_lokasi')->default(0);
            $table->json('pemanfaatan')->nullable();
            $table->json('kepemilikan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_sumber_air_panas');
    }
};
