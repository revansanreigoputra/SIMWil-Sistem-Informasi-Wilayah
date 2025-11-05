<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sektor_industri_menengah_besar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->foreignId('mata_pencaharian_id')->constrained('mata_pencaharians')->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('jumlah')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sektor_industri_menengah_besar');
    }
};