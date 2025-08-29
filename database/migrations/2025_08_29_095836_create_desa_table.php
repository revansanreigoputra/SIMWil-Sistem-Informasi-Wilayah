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
        Schema::create('desa', function (Blueprint $table) {
            $table->id();
            $table->string('kode_desa', 20)->unique();
            $table->string('nama_desa', 100);
            $table->text('alamat_kantor')->nullable();
            $table->foreignId('kepala_desa_id')
                ->nullable()
                ->constrained('kepala_desa')
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->string('email', 100)->nullable();
            $table->string('telepon', 20)->nullable();
            $table->string('website', 150)->nullable();
            $table->string('logo', 255)->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desa');
    }
};
