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
        Schema::create('irigasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->date('tanggal');
            
            // Saluran
            $table->decimal('saluran_primer', 10, 2)->default(0);
            $table->decimal('saluran_primer_rusak', 10, 2)->default(0);
            $table->decimal('saluran_sekunder', 10, 2)->default(0);
            $table->decimal('saluran_sekunder_rusak', 10, 2)->default(0);
            $table->decimal('saluran_tersier', 10, 2)->default(0);
            $table->decimal('saluran_tersier_rusak', 10, 2)->default(0);

            // Pintu Sadap & Pembagi
            $table->integer('pintu_sadap')->default(0);
            $table->integer('pintu_sadap_rusak')->default(0);
            $table->integer('pintu_pembagi_air')->default(0);
            $table->integer('pintu_pembagi_air_rusak')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('irigasis');
    }
};