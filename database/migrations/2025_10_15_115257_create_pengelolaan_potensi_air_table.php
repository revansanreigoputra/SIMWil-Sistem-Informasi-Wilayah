<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengelolaan_potensi_air', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); 
            $table->string('kategori'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengelolaan_potensi_air');
    }
};
