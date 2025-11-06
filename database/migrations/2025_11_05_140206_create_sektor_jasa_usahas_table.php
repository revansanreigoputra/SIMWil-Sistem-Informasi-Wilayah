<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('sektor_jasa_usahas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            
            // Perbaikan di sini: Ganti 'mata_pencahariansas' menjadi 'mata_pencaharians'
            $table->foreignId('mata_pencaharian_id')->constrained('mata_pencaharians')->onDelete('cascade');
            
            $table->date('tanggal');
            $table->integer('jumlah')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('sektor_jasa_usahas');
    }
};