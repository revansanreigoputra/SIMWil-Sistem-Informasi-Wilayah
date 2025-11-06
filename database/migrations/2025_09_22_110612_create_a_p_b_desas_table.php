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
        Schema::create('a_p_b_desas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal');
            $table->bigInteger('apbd_kabupaten')->default(0);
            $table->bigInteger('bantuan_pemerintah_kabupaten')->default(0);
            $table->bigInteger('bantuan_pemerintah_provinsi')->default(0);
            $table->bigInteger('bantuan_pemerintah_pusat')->default(0);
            $table->bigInteger('pendapatan_asli_desa')->default(0);
            $table->bigInteger('swadaya_masyarakat')->default(0);
            $table->bigInteger('alokasi_dana_desa')->default(0);
            $table->bigInteger('sumber_pendapatan_perusahaan')->default(0);
            $table->bigInteger('sumber_pendapatan_lain')->default(0);
            $table->bigInteger('jumlah_penerimaan')->default(0);
            $table->bigInteger('jumlah_belanja_publik')->default(0);
            $table->bigInteger('jumlah_belanja_aparatur')->default(0);
            $table->bigInteger('jumlah_belanja')->default(0);
            $table->bigInteger('saldo_anggaran')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('a_p_b_desas');
    }
};
