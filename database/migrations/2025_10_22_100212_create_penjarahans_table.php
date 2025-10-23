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
        Schema::create('penjarahans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_desa');
            $table->date('tanggal');
            $table->integer('korban_dan_pelaku_penduduk_setempat')->nullable();
            $table->integer('korban_penduduk_setempat_pelaku_bukan_setempat')->nullable();
            $table->integer('korban_bukan_setempat_pelaku_penduduk_setempat')->nullable();
            $table->integer('pelaku_diadili_atau_diproses_hukum')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjarahans');
    }
};
