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
        // Ubah kolom 'status' dengan menambahkan 'siap_diambil'
        // Anda harus mendefinisikan ulang semua nilai ENUM yang sudah ada
        DB::statement("ALTER TABLE permohonans CHANGE status status ENUM(
            'belum_diverifikasi', 
            'diverifikasi', 
            'ditolak', 
            'siap_diambil', 
            'sudah_diambil' 
        ) NOT NULL DEFAULT 'belum_diverifikasi'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Kembalikan ke nilai ENUM sebelumnya jika rollback
        // CATATAN: Jika ada data dengan status 'siap_diambil', rollback ini akan gagal atau merusak data.
        DB::statement("ALTER TABLE permohonans CHANGE status status ENUM(
            'belum_diverifikasi', 
            'diverifikasi', 
            'ditolak', 
            'sudah_diambil'
        ) NOT NULL DEFAULT 'belum_diverifikasi'");
    }
};
