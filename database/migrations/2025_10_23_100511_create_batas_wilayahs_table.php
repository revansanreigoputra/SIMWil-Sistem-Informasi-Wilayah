<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
Schema::create('batas_wilayahs', function (Blueprint $table) {
$table->id();
$table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');

// Data Umum
$table->string('tahun_pembentukan')->nullable();
$table->string('luas_desa')->nullable();
$table->string('kepala_desa')->nullable();
$table->string('nama_pengisi')->nullable();
$table->string('pekerjaan')->nullable();
$table->string('jabatan')->nullable();
$table->date('tanggal')->nullable();

// Batas Wilayah
$table->string('desa_utara')->nullable();
$table->string('desa_selatan')->nullable();
$table->string('desa_timur')->nullable();
$table->string('desa_barat')->nullable();
$table->string('kec_utara')->nullable();
$table->string('kec_selatan')->nullable();
$table->string('kec_timur')->nullable();
$table->string('kec_barat')->nullable();

// Penetapan Batas
$table->enum('penetapan_batas', ['ada', 'tidak ada'])->nullable();
$table->string('dasar_hukum_perdes')->nullable();
$table->string('dasar_hukum_perda')->nullable();
$table->enum('peta_wilayah', ['ada', 'tidak ada'])->nullable();

// Referensi Data
$table->string('referensi_1')->nullable();
$table->string('referensi_2')->nullable();
$table->string('referensi_3')->nullable();
$table->string('referensi_4')->nullable();

$table->timestamps();
});
}

public function down(): void
{
Schema::dropIfExists('batas_wilayahs');
}
};