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
        Schema::create('bpd', function (Blueprint $table) {
            $table->id();
            
            // Gedung kantor
            $table->date('tanggal');
            $table->enum('gedung_kantor', ['ada', 'tidak ada'])->nullable();
            $table->integer('ruang_kerja')->default(0);

            // Kondisi
            $table->enum('balai_bpd', ['ada', 'tidak ada'])->nullable();
            $table->enum('kondisi', ['baik', 'rusak'])->nullable();
            $table->enum('listrik', ['ada', 'tidak ada'])->nullable();
            $table->enum('air_bersih', [
                'ada dan kondisi baik',
                'ada dan kondisi rusak',
                'tidak ada air bersih'
            ])->nullable();
            $table->enum('telepon', ['ada', 'tidak ada'])->nullable();

            // Inventaris dan alat tulis kantor
            $table->integer('mesin_tik')->default(0);
            $table->integer('meja')->default(0);
            $table->integer('kursi')->default(0);
            $table->integer('lemari_arsip')->default(0);
            $table->integer('komputer')->default(0);
            $table->integer('mesin_fax')->default(0);
            $table->enum('inventaris_lainnya', ['ada', 'tidak ada'])->nullable();

            // Administrasi BPD
            $table->integer('buku_administrasi_kegiatan')->default(0);
            $table->integer('buku_administrasi_keanggotaan')->default(0);
            $table->integer('buku_kegiatan')->default(0);
            $table->integer('buku_himpunan_peraturan_desa')->default(0);
            $table->enum('administrasi_lainnya', ['ada', 'tidak ada'])->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bpd');
    }
};