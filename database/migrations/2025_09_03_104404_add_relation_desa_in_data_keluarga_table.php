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
        Schema::table('data_keluargas', function (Blueprint $table) {
            $table->unsignedBigInteger('desa_id');
            $table->string('rt');
            $table->string('rw');
            $table->unsignedBigInteger('kecamatan_id');
            // relasi
            $table->foreign('kecamatan_id')->references('id')->on('kecamatans')->onDelete('cascade');
            $table->foreign('desa_id')->references('id')->on('desas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_keluargas', function (Blueprint $table) {
            $table->dropForeign(['kecamatan_id']);
            $table->dropForeign(['desa_id']);

            $table->dropColumn(['desa_id', 'rt', 'rw', 'kecamatan_id']);
        });
    }
};
