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
        Schema::create('kualitas_air_minums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->date('tanggal');
            $table->foreignId('jenis_air_minum_id')->constrained('jenis_air_minum')->onDelete('cascade');
            $table->enum('baik', ['ya', 'tidak']);
            $table->enum('berbau', ['ya', 'tidak']);
            $table->enum('berwarna', ['ya', 'tidak']);
            $table->enum('berasa', ['ya', 'tidak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kualitas_air_minums');
    }
};
