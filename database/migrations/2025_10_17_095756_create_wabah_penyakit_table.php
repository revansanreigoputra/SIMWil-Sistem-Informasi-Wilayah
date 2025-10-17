<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wabah_penyakit', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('jenis_wabah_id')->constrained('jenis_wabahs')->onDelete('cascade');
            $table->integer('jumlah_kejadian_tahun_ini');
            $table->integer('jumlah_meninggal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wabah_penyakit');
    }
};