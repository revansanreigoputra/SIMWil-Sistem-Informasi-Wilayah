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
        Schema::create('jumlahs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable();
            $table->integer('jumlah_laki')->nullable();
            $table->integer('jumlah_perempuan')->nullable();
            $table->integer('jumlah_total')->nullable();
            $table->integer('jumlah_kk')->nullable();
            $table->integer('jumlah_penduduk')->nullable();
            // $table->string('desa', 50)->nullable();
            // $table->string('kec', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jumlahs');
    }
};
