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
        Schema::create('adatistiadats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal');
            $table->enum('perkawinan', ['Aktif', 'Tidak Aktif', 'Pernah Ada'])->nullable();
            $table->enum('kelahiran_anak', ['Aktif', 'Tidak Aktif', 'Pernah Ada'])->nullable();
            $table->enum('upacara_kematian', ['Aktif', 'Tidak Aktif', 'Pernah Ada'])->nullable();
            $table->enum('pengelolaan_hutan', ['Aktif', 'Tidak Aktif', 'Pernah Ada'])->nullable();
            $table->enum('tanah_pertanian', ['Aktif', 'Tidak Aktif', 'Pernah Ada'])->nullable();
            $table->enum('pengelolaan_laut', ['Aktif', 'Tidak Aktif', 'Pernah Ada'])->nullable();
            $table->enum('memecahkan_konflik', ['Aktif', 'Tidak Aktif', 'Pernah Ada'])->nullable();
            $table->enum('menjauhkan_bala', ['Aktif', 'Tidak Aktif', 'Pernah Ada'])->nullable();
            $table->enum('memulihkan_hubungan_alam', ['Aktif', 'Tidak Aktif', 'Pernah Ada'])->nullable();
            $table->enum('penanggulangan_kemiskinan', ['Aktif', 'Tidak Aktif', 'Pernah Ada'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adatistiadats');
    }
};
