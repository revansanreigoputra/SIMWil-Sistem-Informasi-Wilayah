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
        Schema::create('jenis_prasarana_transportasi_lainnya', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_prasarana_transportasi_lainnya_id');
            $table->foreign('kategori_prasarana_transportasi_lainnya_id', 'fk_jptl_kptl') 
                ->references('id')->on('kategori_prasarana_transportasi_lainnya')
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
        Schema::dropIfExists('jenis_prasarana_transportasi_lainnya');
    }
};
