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
        Schema::create('pembunuhans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_desa');
            $table->date('tanggal'); 
            $table->integer('jumlah_kasus_tahun_ini')->default(0);
            $table->integer('jumlah_kasus_korban_penduduk')->default(0);
            $table->integer('jumlah_kasus_pelaku_penduduk')->default(0);
            $table->integer('jumlah_kasus_bunuh_diri')->default(0);
            $table->integer('jumlah_kasus_diproses_hukum')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembunuhans');
    }
};
