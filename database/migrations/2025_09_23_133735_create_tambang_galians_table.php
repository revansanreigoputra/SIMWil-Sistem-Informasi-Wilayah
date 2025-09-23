<?php
// database/migrations/2024_01_01_000000_create_tambang_galians_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTambangGalianSTable extends Migration
{
    public function up()
    {
        Schema::create('tambang_galians', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->decimal('total_nilai_produksi', 15, 2);
            $table->decimal('total_nilai_bahan_baku', 15, 2);
            $table->decimal('total_nilai_bahan_penolong', 15, 2);
            $table->decimal('total_biaya_antara', 15, 2);
            $table->integer('jumlah_jenis_bahan_tambang');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tambang_galians');
    }
}