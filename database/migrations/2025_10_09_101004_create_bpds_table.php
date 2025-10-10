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
        Schema::create('bpds', function (Blueprint $table) {
            $table->id();
            $table->enum('keberadaan_bpd', ['Ada dan Aktif', 'Ada dan Tidak Aktif', 'Tidak Ada']);
            $table->unsignedSmallInteger('jumlah_anggota');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bpds');
    }
};
