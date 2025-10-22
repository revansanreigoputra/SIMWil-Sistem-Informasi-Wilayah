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
        Schema::create('jenis_prasarana_komunikasi_informasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_prasarana_komunikasi_informasi_id');
            $table->foreign('kategori_prasarana_komunikasi_informasi_id', 'fk_jpti_kpti')
                ->references('id')->on('kategori_prasarana_komunikasi_informasi')
                ->onDelete('cascade');
            $table->string('nama');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_prasarana_komunikasi_informasi');
    }
};
