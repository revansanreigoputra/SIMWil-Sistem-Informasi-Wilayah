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
        Schema::create('air_bersihs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('desa_id')->constrained('desas')->cascadeOnUpdate()->cascadeOnDelete();
            
            $table->date('tanggal');
            $table->integer('sumur_pompa')->default(0);
            $table->integer('sumur_gali')->default(0);
            $table->integer('hidran_umum')->default(0);
            $table->integer('penampung_air_hujan')->default(0);
            $table->integer('tangki_air_bersih')->default(0);
            $table->integer('embung')->default(0);
            $table->integer('mata_air')->default(0);
            $table->integer('bangunan_pengolahan_air')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('air_bersihs');
    }
};