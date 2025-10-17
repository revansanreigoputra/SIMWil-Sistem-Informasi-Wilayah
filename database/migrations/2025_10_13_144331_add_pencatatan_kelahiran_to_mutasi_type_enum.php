<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Mendefinisikan ulang ENUM dengan menambahkan 'pencatatan_kelahiran'
        // Daftar ENUM lama: 'none', 'meninggal', 'pindah_keluar', 'mutasi_masuk_kk'
        DB::statement("ALTER TABLE jenis_surats CHANGE mutasi_type mutasi_type ENUM('none', 'meninggal', 'pindah_keluar', 'mutasi_masuk_kk', 'pencatatan_kelahiran') DEFAULT 'none'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Mengembalikan ke definisi ENUM lama (menghapus 'pencatatan_kelahiran')
        // CATATAN: Pastikan tidak ada data 'pencatatan_kelahiran' yang tersisa sebelum rollback!
        DB::statement("ALTER TABLE jenis_surats CHANGE mutasi_type mutasi_type ENUM('none', 'meninggal', 'pindah_keluar', 'mutasi_masuk_kk') DEFAULT 'none'");
    }
};
