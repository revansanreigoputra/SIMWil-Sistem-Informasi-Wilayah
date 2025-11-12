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
        Schema::create('lembaga_keamanan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->enum('keberadaan_hansip_linmas', ['Ada', 'Tidak Ada'])->nullable();
            $table->integer('jumlah_hansip')->default(0);
            $table->integer('jumlah_satgas_linmas')->default(0);
            $table->enum('pelaksanaan_siskamling', ['Ada', 'Tidak Ada'])->nullable();
            $table->integer('jumlah_pos_kamling')->default(0);

            $table->enum('keberadaan_satpam_swakarsa', ['Ada', 'Tidak Ada'])->nullable();
            $table->integer('jumlah_anggota_satpam')->default(0);
            $table->string('nama_organisasi_induk')->nullable();
            $table->foreignId('pemilik_organisasi_id')
                  ->nullable()
                  ->constrained('pemilik_organisasi')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();

            $table->enum('keberadaan_organisasi_lain', ['Ada', 'Tidak Ada'])->nullable();

            $table->enum('mitra_koramil_tni', ['Ada', 'Tidak Ada'])->nullable();
            $table->integer('jumlah_anggota_koramil_tni')->default(0);
            $table->integer('jumlah_kegiatan_koramil_tni')->default(0);
            
            $table->enum('babinkantibmas_polri', ['Ada', 'Tidak Ada'])->nullable();
            $table->integer('jumlah_anggota_babinkantibmas')->default(0);
            $table->integer('jumlah_kegiatan_babinkantibmas')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lembaga_keamanan');
    }
};
