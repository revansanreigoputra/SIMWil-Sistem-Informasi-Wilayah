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
        Schema::create('organisasis', function (Blueprint $table) {
            $table->id();
           $table->foreignId('desa_id')->constrained('desas')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal');

            $table->enum('jenis_organisasi', [
                'Pemberdayaan dan Kesejahteraan Keluarga (PKK)',
                'Badan Usaha Milik Desa',
                'Forum Komunikasi Kader Pemberdayaan Masyarakat',
                'Karang Taruna',
                'Kelompok Gotong Royong',
                'Kelompok Tani/Nelayan',
                'Lembaga Adat',
                'LKMD/LPM/Sebutan Lain',
                'Organisasi Bapak',
                'Organisasi Keagamaan',
                'Organisasi Pemuda',
                'Organisasi Perempuan',
                'Organisasi Profesi',
                'Posyandu',
                'Posyantokdes',
                'Rukun Tetangga',
                'Rukun Warga',
            ]);

            $table->enum('kepengurusan', [
                'Ada dan Aktif',
                'Ada dan Tidak Aktif',
                'Tidak Ada',
            ])->nullable();

            $table->string('buku_administrasi')->nullable();
            $table->integer('jumlah_kegiatan')->nullable();

            $table->enum('dasar_hukum_pembentukan', [
                'Peraturan Desa',
                'Peraturan Daerah',
                'Tidak Ada',
            ])->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisasis');
    }
};
