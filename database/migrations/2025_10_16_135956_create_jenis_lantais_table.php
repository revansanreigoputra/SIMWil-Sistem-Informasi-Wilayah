<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jenis_lantais', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lantai'); // Field untuk nama lantai
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jenis_lantais');
    }
};
