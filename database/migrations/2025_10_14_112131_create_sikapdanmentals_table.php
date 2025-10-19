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
        Schema::create('sikapdanmentals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_desa');
            $table->date('tanggal');

            // Kolom jenis pungutan & permintaan sumbangan
            $table->integer('jumlah_pungutan_gelandangan')->nullable();
            $table->integer('jumlah_pungutan_terminal_pelabuhan_pasar')->nullable();
            $table->enum('permintaan_sumbangan_perorangan', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('permintaan_sumbangan_terorganisir', ['Ada', 'Tidak Ada'])->nullable();
            $table->enum('praktik_jalan_pintas', ['Ya', 'Tidak'])->nullable();

            $table->integer('jenis_pungutan_rt_rw')->nullable();
            $table->integer('jenis_pungutan_desa_kelurahan')->nullable();
            $table->integer('kasus_aparat_rt_rw')->nullable();
            $table->integer('dipindah_karena_kasus')->nullable();
            $table->integer('diberhentikan_kasus')->nullable();
            $table->integer('dimutasi_kasus')->nullable();

            // Persepsi masyarakat
            $table->enum('masyarakat_biaya_pelayanan', ['Ya', 'Tidak'])->nullable();
            $table->enum('pelayanan_gratis_aparat', ['Ya', 'Tidak'])->nullable();
            $table->enum('keluhan_pelayanan', ['Ya', 'Tidak'])->nullable();
            $table->enum('hiburan_inisiatif_masyarakat', ['Ya', 'Tidak'])->nullable();
            $table->enum('kurang_toleran', ['Ya', 'Tidak'])->nullable();

            // Kondisi wilayah
            $table->enum('wilayah_sangat_luas', ['Ya', 'Tidak'])->nullable();
            $table->enum('lahan_terlantar', ['Ya', 'Tidak'])->nullable();
            $table->enum('lahan_perkarangan_tidak_dimanfaatkan', ['Ya', 'Tidak'])->nullable();
            $table->enum('tidur_milir_tidak_dimanfaatkan', ['Ya', 'Tidak'])->nullable();

            // Kegiatan ekonomi
            $table->enum('petani_gagal_panen', ['Tinggi', 'Sedang', 'Rendah'])->nullable();
            $table->enum('nelayan_tidak_melayat', ['Tinggi', 'Sedang', 'Rendah'])->nullable();
            $table->enum('cari_pekerjaan_luar_desa', ['Ya', 'Tidak'])->nullable();
            $table->enum('cari_pekerjaan_kota_besar', ['Ya', 'Tidak'])->nullable();

            // Kebiasaan masyarakat
            $table->enum('rayakan_pesta', ['Tinggi', 'Sedang', 'Rendah'])->nullable();
            $table->enum('menuntut_kebutuhan_pokok', ['Tinggi', 'Sedang', 'Rendah'])->nullable();
            $table->enum('mencari_bahan_pengganti_pangan', ['Tinggi', 'Sedang', 'Rendah'])->nullable();
            $table->enum('pemotongan_hewan_besar', ['Tinggi', 'Sedang', 'Rendah'])->nullable();
            $table->enum('berdemo', ['Tinggi', 'Sedang', 'Rendah'])->nullable();
            $table->enum('terprovokasi_isu', ['Tinggi', 'Sedang', 'Rendah'])->nullable();
            $table->enum('bermusyawarah', ['Tinggi', 'Sedang', 'Rendah'])->nullable();

            $table->enum('masyarakat_apatih', ['Ya', 'Tidak'])->nullable();
            $table->enum('aparat_kurang_menangani', ['Tinggi', 'Sedang', 'Rendah'])->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sikapdanmentals');
    }
};
