<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sektor_angkutan_komunikasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->date('tanggal');

            // Sub Sektor Angkutan
            $table->integer('jml_kegiatan_pengangkutan')->nullable();
            $table->integer('jml_total_kendaraan_angkutan')->nullable();
            $table->bigInteger('nilai_total_transaksi_pengangkutan')->nullable();
            $table->bigInteger('nilai_total_biaya_dikeluarkan')->nullable();

            // Sub Sektor Jasa Penunjang Angkutan
            $table->integer('jml_kegiatan_pelabuhan_terminal')->nullable();
            $table->bigInteger('total_nilai_transaksi_penunjang')->nullable();
            $table->bigInteger('nilai_biaya_antara_dikeluarkan')->nullable();

            // Sub Sektor Komunikasi
            $table->integer('jml_kegiatan_informasi_telekomunikasi')->nullable();
            $table->bigInteger('jml_nilai_aset_telekomunikasi')->nullable();
            $table->bigInteger('nilai_transaksi_informasi')->nullable();
            $table->bigInteger('biaya_dikeluarkan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sektor_angkutan_komunikasis');
    }
};
