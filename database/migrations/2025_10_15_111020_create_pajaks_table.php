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
        Schema::create('pajaks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_desa');
            $table->date('tanggal');

            // Data Pajak
            $table->string('jenis_pajak')->nullable();
            $table->integer('jumlah_wajib_pajak')->nullable();
            $table->bigInteger('target_pbb')->nullable();
            $table->decimal('realisasi_pbb', 8, 2)->nullable();
            $table->integer('jumlah_tindakan_penunggak_pbb')->nullable();

            // Data Retribusi
            $table->string('jenis_retribusi')->nullable();
            $table->integer('jumlah_wajib_retribusi')->nullable();
            $table->bigInteger('target_retribusi')->nullable();
            $table->decimal('realisasi_retribusi', 8, 2)->nullable();

            // Data pungutan resmi
            $table->string('jenis_pungutan_resmi')->nullable();
            $table->bigInteger('target_pungutan_resmi')->nullable();
            $table->decimal('realisasi_pungutan_resmi', 8, 2)->nullable();

            // Kasus pungutan liar
            $table->integer('jumlah_kasus_pungli')->nullable();
            $table->integer('jumlah_penyelesaian_pungli')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pajaks');
    }
};
