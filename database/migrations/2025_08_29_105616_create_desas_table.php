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
        Schema::create('desas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('kecamatan_id')
                ->constrained('kecamatans')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->string('nama_desa', 100);
            $table->enum('status', ['desa'])->default('desa');
            $table->string('kelurahan_terluar', 100)->nullable();
            $table->text('tipologi')->nullable();
            $table->integer('luas')->nullable(); // km2 misalnya
            $table->text('bujur')->nullable();
            $table->text('lintang')->nullable();
            $table->integer('ketinggian')->nullable(); // mdpl
            $table->string('kode_pum', 50)->unique();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desas');
    }
};
