<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        Schema::create('sektortambang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->date('tanggal')->nullable();
            $table->integer('penambang_galian_c')->nullable();
            $table->integer('pemilik_usaha_pertambangan')->nullable();
            $table->integer('buruh_usaha_pertambangan')->nullable();
            $table->integer('jumlah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Hapus tabel.
     */
    public function down(): void
    {
        Schema::dropIfExists('sektortambang');
    }
};
