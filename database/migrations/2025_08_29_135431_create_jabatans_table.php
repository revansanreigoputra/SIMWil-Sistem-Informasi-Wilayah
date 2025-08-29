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

        Schema::create('jabatans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jabatan');

            // Relasi ke desa
            $table->foreignId('desa_id')
                ->nullable()
                ->constrained('desas')
                ->nullOnDelete()
                ->cascadeOnUpdate();

            // Relasi ke kecamatan
            $table->foreignId('kecamatan_id')
                ->nullable()
                ->constrained('kecamatans')
                ->nullOnDelete()
                ->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jabatans');
    }
};
