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
    Schema::create('agendas', function (Blueprint $table) {
        $table->id();
        $table->date('tgl_dari');
        $table->date('tgl_sampai');
        $table->string('lokasi');
        $table->string('kegiatan');
        $table->text('peserta');
        $table->timestamps(); 
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
