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
        Schema::create('p_kewarganegaraans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('kewarganegaraan_id')->constrained('kewarganegaraans')->onDelete('cascade');
            $table->integer('jumlah_laki_laki');
            $table->integer('jumlah_perempuan');
            $table->integer('jumlah_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_kewarganegaraans');
    }
};
