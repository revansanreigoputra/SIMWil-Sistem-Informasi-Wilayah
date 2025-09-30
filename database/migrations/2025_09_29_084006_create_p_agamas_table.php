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
        Schema::create('p_agamas', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('id_agama')->constrained('agama')->onDelete('cascade');
            $table->integer('laki');
            $table->integer('perempuan');
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_agamas');
    }
};
