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
        Schema::create('prostitusis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_desa');
            $table->date('tanggal');
            $table->integer('jumlah_penduduk_pramu_nikmat')->nullable();
            $table->enum('lokalisasi_prostitusi', ['Ada', 'Tidak Ada']);
            $table->integer('jumlah_tempat_pramunikmat')->nullable();
            $table->integer('jumlah_kasus_prostitusi')->nullable();
            $table->integer('jumlah_pembinaan_pelaku')->nullable();
            $table->integer('jumlah_penertiban_tempat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prostitusis');
    }
};
