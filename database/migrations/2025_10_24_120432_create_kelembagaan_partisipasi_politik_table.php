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
        Schema::create('kelembagaan_partisipasi_politik', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partisipasi_politik_id')
                ->constrained('partisipasi_politik')
                ->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('jumlah_wanita_hak_pilih')->default(0);
            $table->integer('jumlah_pria_hak_pilih')->default(0);
            $table->integer('jumlah_pemilih')->default(0);
            $table->integer('jumlah_wanita_memilih')->default(0);
            $table->integer('jumlah_pria_memilih')->default(0);
            $table->integer('jumlah_penggunaan_hak_pilih')->default(0);
            $table->decimal('persentase', 5, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelembagaan_partisipasi_politik');
    }
};
