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
        Schema::create('wisatas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->date('tanggal');
            $table->foreignId('area_wisata_id')->constrained('area_wisata')->onDelete('cascade');
            $table->enum('keberadaan', ['ada', 'tidak ada'])->default('ada');
            $table->decimal('luas_m2', 15, 2)->default(0);
            $table->enum('tingkat_pemanfaatan', ['aktif', 'pasif'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisatas');
    }
};
