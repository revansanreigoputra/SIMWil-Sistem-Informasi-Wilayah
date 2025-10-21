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
        Schema::create('sektor_bangunans', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('desa_id'); // Relasi ke desa
            $table->date('tanggal');
            $table->integer('jumlah_bangunan_tahun_ini')->nullable();
            $table->bigInteger('biaya_pemeliharaan')->nullable();
            $table->bigInteger('total_nilai_bangunan')->nullable();
            $table->bigInteger('biaya_antara_lainnya')->nullable();
            $table->timestamps();

            // 🔹 Foreign key ke tabel desas
            $table->foreign('desa_id')->references('id')->on('desas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus foreign key dulu sebelum drop tabel
        Schema::table('sektor_bangunans', function (Blueprint $table) {
            $table->dropForeign(['desa_id']);
        });

        Schema::dropIfExists('sektor_bangunans');
    }
};
