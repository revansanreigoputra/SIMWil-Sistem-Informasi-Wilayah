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
        Schema::create('lahan_pakan_ternaks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->date('tanggal');
            $table->decimal('luas_tanaman_pakan_ternak', 10, 2)->default(0);
            $table->decimal('produksi_hijauan_makanan_ternak', 10, 2)->default(0);
            $table->decimal('dipasok_dari_luar_desa_kelurahan', 10, 2)->default(0);
            $table->decimal('disubsidi_dinas', 10, 2)->default(0);
            $table->decimal('lainnya_pakan_ternak', 10, 2)->default(0);
            $table->decimal('milik_masyarakat_umum', 10, 2)->default(0);
            $table->decimal('milik_perusahaan_peternakan_ranch', 10, 2)->default(0);
            $table->decimal('milik_perorangan', 10, 2)->default(0);
            $table->decimal('sewa_pakai', 10, 2)->default(0);
            $table->decimal('milik_pemerintah', 10, 2)->default(0);
            $table->decimal('milik_masyarakat_adat', 10, 2)->default(0);
            $table->decimal('lainnya_pemeliharaan_ternak', 10, 2)->default(0);
            $table->decimal('luas_lahan_gembalaan', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lahan_pakan_ternaks');
    }
};
