<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aset_tanahs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_desa');
            $table->date('tanggal');
            $table->integer('tidak_memiliki')->nullable();
            $table->integer('tanah1')->nullable();
            $table->integer('tanah2')->nullable();
            $table->integer('tanah3')->nullable();
            $table->integer('tanah4')->nullable();
            $table->integer('tanah5')->nullable();
            $table->integer('tanah6')->nullable();
            $table->integer('tanah7')->nullable();
            $table->integer('tanah8')->nullable();
            $table->integer('tanah9')->nullable();
            $table->integer('tanah10')->nullable();
            $table->integer('tanah11')->nullable();
            $table->integer('memiliki_lebih')->nullable();
            $table->integer('jumlah')->nullable();
            $table->timestamps();

            $table->foreign('id_desa')
                ->references('id')
                ->on('desas')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aset_tanahs');
    }
};
