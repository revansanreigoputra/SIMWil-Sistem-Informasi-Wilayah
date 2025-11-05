<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hasil_produksis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->foreignId('komoditas_pangan_id')->constrained('komoditas_pangan')->onDelete('cascade');
            $table->double('luas_produksi')->default(0);
            $table->double('hasil_produksi')->default(0);
            $table->double('harga_lokal')->default(0);
            $table->double('nilai_produksi_tahun_ini')->default(0);
            $table->double('biaya_pemupukan')->default(0);
            $table->double('biaya_bibit')->default(0);
            $table->double('biaya_obat')->default(0);
            $table->double('biaya_lainnya')->default(0);
            $table->double('saldo_produksi')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hasil_produksis');
    }
};