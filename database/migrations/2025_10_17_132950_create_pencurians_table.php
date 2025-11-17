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
        Schema::create('pencurians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('kasus_tahun_ini')->nullable();
            $table->integer('korban_penduduk_setempat')->nullable();
            $table->integer('pelaku_penduduk_setempat')->nullable();
            $table->integer('pencurian_bersenjata_api')->nullable();
            $table->integer('pelaku_diadili')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pencurians');
    }
};
