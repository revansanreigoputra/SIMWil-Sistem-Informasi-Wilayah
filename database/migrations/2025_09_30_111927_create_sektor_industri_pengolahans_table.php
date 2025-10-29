<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sektor_industri_pengolahans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('desa_id'); // ✅ Tambahan desa_id
            $table->date('tanggal');
            $table->string('jenis_industri');
            $table->bigInteger('nilai_produksi')->default(0);
            $table->bigInteger('nilai_bahan_baku')->default(0);
            $table->bigInteger('nilai_bahan_penolong')->default(0);
            $table->bigInteger('biaya_antara')->default(0);
            $table->bigInteger('jumlah_jenis_industri')->default(0);
            $table->timestamps();

            // ✅ Relasi ke tabel desas
            $table->foreign('desa_id')->references('id')->on('desas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sektor_industri_pengolahans');
    }
};
