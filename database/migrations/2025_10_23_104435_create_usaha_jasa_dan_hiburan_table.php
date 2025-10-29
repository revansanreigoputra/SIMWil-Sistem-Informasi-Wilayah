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
        Schema::create('usaha_jasa_dan_hiburan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')
                ->constrained('kategori_usaha_jasa_dan_hiburan')
                ->onDelete('cascade');

            // relasi ke tabel jenis_usaha_hiburan
            $table->foreignId('jenis_usaha_id')
                ->constrained('jenis_usaha_hiburan')
                ->onDelete('cascade');

            // kolom lainnya
            $table->date('tanggal');
            $table->integer('jumlah_unit')->default(0);
            $table->string('jenis_produk')->default(0);
            $table->integer('jumlah_tenaga_kerja')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usaha_jasa_dan_hiburan');
    }
};
