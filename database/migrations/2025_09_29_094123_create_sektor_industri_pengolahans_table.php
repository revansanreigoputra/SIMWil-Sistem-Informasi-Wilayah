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
        Schema::create('sektor_industri_pengolahans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal'); // Tanggal
            $table->string('jenis_industri'); // Jenis Industri
            $table->decimal('nilai_produksi_tahunan', 15, 2)->default(0); // Total nilai produksi tahun ini (Rp)
            $table->decimal('nilai_bahan_baku', 15, 2)->default(0); // Total nilai bahan baku yang digunakan (Rp)
            $table->decimal('nilai_bahan_penolong', 15, 2)->default(0); // Total nilai bahan penolong yang digunakan (Rp)
            $table->decimal('biaya_antara', 15, 2)->default(0); // Total biaya antara yang dihabiskan (Rp)
            $table->integer('jumlah_jenis_industri_tsb')->default(0); // Total jumlah jenis industri tsb yang ada (Jenis)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sektor_industri_pengolahans');
    }
};