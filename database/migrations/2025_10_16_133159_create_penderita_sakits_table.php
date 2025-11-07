<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
       Schema::create('penderita_sakits', function (Blueprint $table) {
    $table->id();

    // Tambahkan kolom desa_id
    $table->unsignedBigInteger('desa_id')->nullable();
    $table->foreign('desa_id')->references('id')->on('desas')->onDelete('cascade');

    $table->date('tanggal');
    $table->foreignId('jenis_penyakit_id')->constrained('jenis_penyakits')->onDelete('cascade');
    $table->integer('jumlah_penderita');
    $table->foreignId('tempat_perawatan_id')->constrained('tempat_perawatan')->onDelete('cascade');
    $table->timestamps();
});

    }

    public function down(): void {
        Schema::dropIfExists('penderita_sakits');
    }
};
