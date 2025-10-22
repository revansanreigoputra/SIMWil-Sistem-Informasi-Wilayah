<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usias', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');

            // Kolom untuk laki-laki usia 0 - 75
            for ($i = 0; $i <= 75; $i++) {
                $table->integer("l{$i}")->nullable();
            }

            // Kolom untuk perempuan usia 0 - 75
            for ($i = 0; $i <= 75; $i++) {
                $table->integer("p{$i}")->nullable();
            }
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usias');
    }
};
