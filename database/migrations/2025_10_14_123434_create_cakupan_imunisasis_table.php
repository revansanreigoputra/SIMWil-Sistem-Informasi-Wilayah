<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cakupan_imunisasis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable();
            $table->integer('bayi_usia_2_bulan')->nullable();
            $table->integer('bayi_2_bulan_dpt1_bcg_polio1')->nullable();
            $table->integer('bayi_usia_3_bulan')->nullable();
            $table->integer('bayi_3_bulan_dpt2_polio2')->nullable();
            $table->integer('bayi_usia_4_bulan')->nullable();
            $table->integer('bayi_4_bulan_dpt3_polio3')->nullable();
            $table->integer('bayi_usia_9_bulan')->nullable();
            $table->integer('bayi_9_bulan_campak')->nullable();
            $table->integer('bayi_imunisasi_cacar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cakupan_imunisasis');
    }
};
