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
        Schema::create('sanitasis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('desa_id')
                ->constrained('desas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
                
            $table->date('tanggal');
            $table->integer('sumur_resapan_air')->default(0);
            $table->integer('mck_umum')->default(0);
            $table->integer('jamban_keluarga')->default(0);

            // Enum
            $table->enum('saluran_drainase', ['ada', 'tidak ada'])->nullable();
            $table->enum('kondisi_saluran', ['rusak', 'mampet', 'kurang memadai', 'baik'])->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanitasis');
    }
};