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
        Schema::create('hasilpembangunans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');

            $table->integer('jumlah_masyarakat_terlibat')->nullable();
            $table->integer('jumlah_penduduk_dilibatkan')->nullable();
            $table->integer('jumlah_kegiatan_masyarakat')->nullable();
            $table->integer('jumlah_kegiatan_pihak_ketiga')->nullable();
            $table->integer('jumlah_kegiatan_luar_musrenbang')->nullable();
            $table->integer('jumlah_masyarakat_disetujui_rk')->nullable();
            $table->integer('usulan_pemerintah_desa_kelurahan_disetujui_rk')->nullable();
            $table->integer('usulan_rencana_kerja_program')->nullable();

            $table->enum('penyelenggaraan_musyawarah', ['Ada', 'Tidak Ada'])->nullable();
            $table->integer('pelaksanaan_kegiatan_masyarakat')->nullable();
            $table->enum('pelaksanaan_kegiatan_tersisa', ['Ada', 'Tidak Ada'])->nullable();

            $table->integer('jumlah_kasus_penyimpangan_kepada_kepala_desa')->nullable();
            $table->integer('jumlah_kasus_penyimpangan_desa_kelurahan')->nullable();
            $table->integer('jumlah_kasus_penyimpangan_desa_kelurahan_hukum')->nullable();

            $table->string('jenis_kegiatan_pemeliharaan')->nullable();

            $table->integer('jumlah_kegiatan_didanai_apb_desa')->nullable();
            $table->integer('jumlah_kegiatan_didanai_apb_kabupaten')->nullable();
            $table->integer('jumlah_kegiatan_didanai_apbd_provinsi')->nullable();
            $table->integer('jumlah_kegiatan_didanai_apbn')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasilpembangunans');
    }
};
