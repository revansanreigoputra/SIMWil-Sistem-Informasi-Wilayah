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
        Schema::create('lembaga_pendidikan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')
                ->constrained('kategori_sekolah')
                ->onDelete('cascade');
            $table->foreignId('jenis_sekolah_id')
                ->constrained('jenis_sekolah_tingkatan')
                ->onDelete('cascade');
            $table->date('tanggal');
            $table->string('status')->nullable(); // contoh: Negeri / Swasta / Campuran
            $table->integer('jumlah_negeri')->default(0);
            $table->integer('jumlah_swasta')->default(0);
            $table->integer('jumlah_dimiliki_desa')->default(0);
            $table->integer('jumlah')->default(0);
            $table->integer('jumlah_pengajar')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lembaga_pendidikan');
    }
};
