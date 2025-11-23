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
        Schema::create('p_sumber_air_bersihs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('sumber_air_bersih_id')->constrained('sumber_air_bersih')->onDelete('cascade');
            $table->integer('jumlah');
            $table->integer('pemanfaat');
            $table->enum('kondisi', ['baik', 'rusak']);
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_sumber_air_bersihs');
    }
};
