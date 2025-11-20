<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kategori_keahlians', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique(); // unique() agar tidak ada nama yang sama
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kategori_keahlians');
    }
};
