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
        Schema::create('perkelahians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_desa');
            $table->date('tanggal');
            $table->integer('kasus_tahun_ini')->default(0);
            $table->integer('kasus_korban_jiwa')->default(0);
            $table->integer('kasus_luka_parah')->default(0);
            $table->integer('kasus_kerugian_material')->default(0);
            $table->integer('pelaku_diadili')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perkelahians');
    }
};
