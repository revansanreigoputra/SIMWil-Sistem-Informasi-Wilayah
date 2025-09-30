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
        Schema::create('kemasyarakatans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable();

            // GEDUNG KANTOR LKD/LKK
            $table->enum('gedung_lembaga_kemasyarakatan', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('peralatan_kantor_lkd', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('mesin_tik_lkd', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('kardek_lkd', ['Ada', 'Tidak Ada'])->nullable();
            $table->string('buku_administrasi_lembaga_lkd')->nullable();
            $table->string('jumlah_meja_kursi_lkd')->nullable();
            $table->enum('lainnya_lkd', ['Ada', 'Tidak Ada'])->nullable();

            // LKMD / LPM
            $table->enum('memiliki_kantor_sendiri', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('peralatan_kantor_lpm', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('mesin_tik_lpm', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('kardek_lpm', ['Ada', 'Tidak Ada'])->nullable();
            $table->string('buku_administrasi_lembaga_lpm')->nullable();
            $table->string('jumlah_meja_kursi_lpm')->nullable();
            $table->string('buku_administrasi_lpm')->nullable();
            $table->string('jumlah_kegiatan_lpm')->nullable();
            $table->enum('lainnya_lpm', ['Ada', 'Tidak Ada'])->nullable();

            // PKK
            $table->enum('pkk', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('gedung_kantor_pkk', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('peralatan_kantor_pkk', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('kepengurusan_pkk', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('buku_administrasi_pkk', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('kegiatan_pkk', ['Ada', 'Tidak Ada'])->nullable();
            $table->string('jumlah_kegiatan_pkk')->nullable();
            $table->enum('kelengkapan_darmawisata_pkk', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('kelengkapan_pokja_pkk', ['Ada', 'Tidak Ada'])->nullable();

            // Karang Taruna
            $table->enum('karang_taruna', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('kepengurusan_karang', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('buku_administrasi_karang', ['Ada', 'Tidak Ada'])->nullable();
            $table->string('jumlah_kegiatan_karang')->nullable();
            $table->enum('lainnya_karang', ['Ada', 'Tidak Ada'])->nullable();

            // Rukun Tangga
            $table->enum('rukun_tangga', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('kepengurusan_rt', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('buku_administrasi_rt', ['Ada', 'Tidak Ada'])->nullable();
            $table->string('jumlah_kegiatan_rt')->nullable();

            // Rukun Warga
            $table->enum('rukun_warga', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('kepengurusan_rw', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('buku_administrasi_rw', ['Ada', 'Tidak Ada'])->nullable();
            $table->string('jumlah_kegiatan_rw')->nullable();
            $table->enum('lainnya_rw', ['Ada', 'Tidak Ada'])->nullable();

            // Lembaga Adat
            $table->enum('lembaga_adat', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('gedung_kantor_adat', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('kepengurusan_adat', ['Ada', 'Tidak Ada'])->nullable();
            $table->string('buku_administrasi_adat')->nullable();
            $table->string('jumlah_kegiatan_adat')->nullable();

            // BUMDes
            $table->enum('bumdes', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('gedung_kantor_bumdes', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('kepengurusan_bumdes', ['Ada', 'Tidak Ada'])->nullable();
            $table->string('buku_administrasi_bumdes')->nullable();
            $table->string('jumlah_kegiatan_bumdes')->nullable();

            // Forum Komunikasi Kader Pemberdayaan Masyarakat
            $table->enum('forum_komunikasi_kader', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('gedung_kantor_forum', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('kepengurusan_forum', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('buku_administrasi_forum', ['Ada', 'Tidak Ada'])->nullable();
            $table->string('jumlah_kegiatan_forum')->nullable();
            $table->string('lainnya_forum')->nullable();

            // Lain-lain
            $table->enum('gedung_kantor_sosial_lain', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('gedung_kantor_profesi_lain', ['Ada', 'Tidak Ada'])->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kemasyarakatans');
    }
};