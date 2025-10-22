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
            $table->unsignedBigInteger('id_desa');
            $table->date('tanggal');
            $table->integer('kasus_tahun_ini')->default(0);
            $table->integer('korban_penduduk_setempat')->default(0);
            $table->integer('pelaku_penduduk_setempat')->default(0);
            $table->integer('pencurian_bersenjata_api')->default(0);
            $table->integer('pelaku_diadili')->default(0);
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
