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
        Schema::create('musrenbangdesas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal');

            $table->integer('jumlah_musrenbang_desa_kelurahan')->nullable();
            $table->integer('jumlah_kehadiran_masyarakat')->nullable();
            $table->integer('jumlah_peserta_laki')->nullable();
            $table->integer('jumlah_peserta_perempuan')->nullable();
            $table->integer('jumlah_musrenbang_antar_desa')->nullable();

            $table->enum('penggunaan_profil_desa', ['Ada', 'Tidak Ada'])->nullable(); // Ya / Tidak
            $table->enum('penggunaan_data_bps',['Ada', 'Tidak Ada'])->nullable();    // Ya / Tidak
            $table->enum('pelibatan_masyarakat', ['Ada', 'Tidak Ada'])->nullable(); // Ya / Tidak

            $table->integer('usulan_masyarakat_disetujui')->nullable();
            $table->integer('usulan_pemerintah_desa_disetujui')->nullable();
            $table->integer('usulan_rencana_kerja_pemkab')->nullable();
            $table->integer('usulan_rencana_kerja_ditolak')->nullable();

            $table->enum('dokumen_rkpdes', ['Ada', 'Tidak Ada'])->nullable();   // Ada / Tidak Ada
            $table->enum('dokumen_rpjmdes', ['Ada', 'Tidak Ada'])->nullable(); // Ada / Tidak Ada
            $table->enum('dokumen_hasil_musrenbang', ['Ada', 'Tidak Ada'])->nullable(); // Ada / Tidak Ada

            $table->integer('jumlah_kegiatan_terdanai')->nullable();
            $table->integer('jumlah_kegiatan_tidak_sesuai')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musrenbangdesas');
    }
};
