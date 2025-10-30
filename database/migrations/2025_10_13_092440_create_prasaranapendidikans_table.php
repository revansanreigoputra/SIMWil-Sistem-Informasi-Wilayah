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
        Schema::create('prasaranapendidikans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->date('tanggal');
            $table->foreignId('jpgedung_id')->constrained('jpgedungs')->onDelete('cascade');
            $table->integer('jumlah_sewa')->default(0);      // Jumlah sewa gedung
            $table->integer('jumlah_milik_sendiri')->default(0); // Jumlah gedung milik sendiri
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prasaranapendidikans');
    }
};