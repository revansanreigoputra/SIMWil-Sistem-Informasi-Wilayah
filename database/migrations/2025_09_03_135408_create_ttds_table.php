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
        Schema::create('ttds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perangkat_desa_id')
                ->nullable()
                ->constrained('perangkat_desas')
                ->nullOnDelete();
            $table->string('nip', 50)->nullable();
            $table->string('nama', 100);
            $table->string('jabatan', 100);
            $table->boolean('status_aktif')->default(true);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ttds');
    }
};
