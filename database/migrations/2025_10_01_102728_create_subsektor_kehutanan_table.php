<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('subsektor_kehutanan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->bigInteger('total_nilai_produksi_tahun_ini')->default(0);
            $table->bigInteger('total_nilai_bahan_baku_digunakan')->default(0);
            $table->bigInteger('total_nilai_bahan_penolong_digunakan')->default(0);
            $table->bigInteger('total_biaya_antara_dihabiskan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subsektor_kehutanan');
    }
};
