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
        Schema::create('kualitas_udaras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->date('tanggal');
            $table->foreignId('sumber_pencemaran_id')->constrained('pencemaran')->onDelete('cascade');
            $table->integer('jumlah_lokasi_sumber_pencemaran')->default(0);
            $table->string('jenis_polutan');
            $table->enum('efek_terhadap_kesehatan', ['gangguan penglihatan', 'gangguan pendengaran']);
            $table->enum('kepemilikan_pemda', ['ya', 'tidak'])->default('tidak');
            $table->enum('kepemilikan_swasta', ['ya', 'tidak'])->default('tidak');
            $table->enum('kepemilikan_perorangan', ['ya', 'tidak'])->default('tidak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kualitas_udaras');
    }
};
