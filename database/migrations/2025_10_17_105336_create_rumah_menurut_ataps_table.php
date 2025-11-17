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
            
            // Relasi ke kecamatan (opsional)
            $table->unsignedBigInteger('id_kec')->nullable();

            // Relasi ke desa
            $table->unsignedBigInteger('id_desa');

            // Tanggal pencatatan
            $table->date('tanggal');

            // Relasi ke master data atap
            $table->unsignedBigInteger('id_aset_atap');

            // Jumlah rumah
            $table->integer('jumlah');

            $table->timestamps();

            // Foreign keys
            $table->foreign('id_desa')
                  ->references('id')
                  ->on('desas')
                  ->onDelete('cascade');

            // 🔧 Diperbaiki: relasi ke tabel aset_ataps (bukan jenis_ataps)
            $table->foreign('id_aset_atap')
                  ->references('id')
                  ->on('aset_ataps')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rumah_menurut_ataps');
    }
}
