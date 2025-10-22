<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisAtapsTable extends Migration
{
    /**
     * Jalankan migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_ataps', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jenis_atap');
            $table->timestamps();
        });
    }

    /**
     * Reverse migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_ataps');
    }
}
