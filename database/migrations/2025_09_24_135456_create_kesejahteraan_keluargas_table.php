<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kesejahteraan_keluargas', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('prasejahtera');
            $table->integer('sejahtera1');
            $table->integer('sejahtera2');
            $table->integer('sejahtera3');
            $table->integer('sejahteraplus');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kesejahteraan_keluargas');
    }
};
