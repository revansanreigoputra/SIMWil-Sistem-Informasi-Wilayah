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
            
            $table->unsignedBigInteger('nama_pengisi_id')->nullable();

            $table->foreign('nama_pengisi_id')->references('id')->on('perangkat_desas')->onDelete('set null');


          });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_keluargas', function (Blueprint $table) {
            
           
            $table->dropForeign(['nama_pengisi_id']);

            $table->dropColumn(['nama_pengisi_id']);
        });
    }
};
