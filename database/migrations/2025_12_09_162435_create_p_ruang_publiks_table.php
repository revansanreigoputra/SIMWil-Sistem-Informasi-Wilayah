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
        Schema::create('p_ruang_publiks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('ruang_publik_id')->constrained('ruang_publik')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('tanggal');
            $table->enum('keberadaan', ['ada', 'tidak'])->default('ada');
            $table->decimal('luas_m2', 12, 2)->default(0);
            $table->enum('tingkat_pemanfaatan', ['aktif', 'pasif'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_ruang_publiks');
    }
};
