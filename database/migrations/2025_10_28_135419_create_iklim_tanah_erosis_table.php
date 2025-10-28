<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('iklim_tanah_erosis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');

            // Bagian Iklim
            $table->date('tanggal');
            $table->decimal('curah_hujan', 8, 2)->default(0);
            $table->integer('jumlah_bulan_hujan')->default(0);
            $table->decimal('kelembapan_udara', 5, 2)->default(0);
            $table->decimal('suhu_rata_rata', 5, 2)->default(0);
            $table->decimal('tinggi_permukaan_laut', 8, 2)->default(0);

            // Bagian Tanah
            $table->enum('warna_tanah', ['kuning', 'hitam', 'abu-abu', 'merah']);
            $table->enum('tekstur_tanah', ['pasiran', 'debulan', 'lempungan']);
            $table->decimal('kemiringan_tanah', 5, 2)->default(0);
            $table->decimal('lahan_kritis', 8, 2)->default(0);
            $table->decimal('lahan_terlantar', 8, 2)->default(0);

            // Bagian Erosi
            $table->decimal('tanah_erosi_ringan', 8, 2)->default(0);
            $table->decimal('tanah_erosi_sedang', 8, 2)->default(0);
            $table->decimal('tanah_erosi_berat', 8, 2)->default(0);
            $table->decimal('tanah_tidak_ada_erosi', 8, 2)->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('iklim_tanah_erosis');
    }
};