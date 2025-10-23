<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRumahMenurutAtapsTable extends Migration
{
    /**
     * Jalankan migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rumah_menurut_ataps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kec')->nullable(); // opsional, tidak perlu input manual
            $table->unsignedBigInteger('id_desa');
            $table->date('tanggal');
            $table->unsignedBigInteger('id_aset_atap'); // relasi ke jenis_ataps
            $table->integer('jumlah');
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_desa')->references('id')->on('desas')->onDelete('cascade');
            $table->foreign('id_aset_atap')->references('id')->on('jenis_ataps')->onDelete('cascade');
        });
    }

    /**
     * Reverse migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rumah_menurut_ataps');
    }
}
