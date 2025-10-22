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
        Schema::create('dusuns', function (Blueprint $table) {
            $table->id();

            $table->foreignId('desa_id')->constrained('desas')->cascadeOnDelete();

            // Data umum
            $table->date('tanggal');
            $table->enum('gedung_kantor', ['ada', 'tidak ada'])->nullable();
            $table->enum('alat_tulis_kantor', ['ada', 'tidak ada'])->nullable();
            $table->enum('barang_inventaris', ['ada', 'tidak ada'])->nullable();
            $table->enum('buku_administrasi', ['ada', 'tidak ada'])->nullable();

            $table->integer('jenis_kegiatan')->default(0);
            $table->integer('jumlah_pengurus')->default(0);

            $table->enum('lainnya', ['ada', 'tidak ada'])->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dusuns');
    }
};