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
        Schema::create('mata_pencaharian_pokoks', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('mata_pencaharian_id')->constrained('mata_pencaharians')->onDelete('cascade');
            $table->unsignedInteger('laki_laki')->default(0);
            $table->unsignedInteger('perempuan')->default(0);
            $table->unsignedInteger('total')->default(0);
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade'); // Add desa_id
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_pencaharian_pokoks');
    }
};
