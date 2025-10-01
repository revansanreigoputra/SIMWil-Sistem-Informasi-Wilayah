<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('sektor_bangunans', function (Blueprint $table) {
        $table->id();
        $table->date('tanggal');
        $table->integer('jumlah_bangunan_tahun_ini')->nullable();
        $table->bigInteger('biaya_pemeliharaan')->nullable();
        $table->bigInteger('total_nilai_bangunan')->nullable();
        $table->bigInteger('biaya_antara_lainnya')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sektor_bangunans');
    }
};
