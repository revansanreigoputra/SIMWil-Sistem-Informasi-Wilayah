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
        Schema::create('p_pendidikans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->unsignedBigInteger('id_pendidikan');
            $table->bigInteger('laki')->default(0);
            $table->bigInteger('perempuan')->default(0);
            $table->timestamps();

            // Relasi ke tabel pendidikan
            $table->foreign('id_pendidikan')
                ->references('id')
                ->on('pendidikans')
                ->onDelete('restrict'); 
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_pendidikans');
    }
};
