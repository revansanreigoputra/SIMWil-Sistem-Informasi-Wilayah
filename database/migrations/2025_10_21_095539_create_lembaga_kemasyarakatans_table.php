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
        Schema::create('lembaga_kemasyarakatans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable();
            $table->unsignedBigInteger('jenis_lembaga_id')->nullable();
            $table->foreign('jenis_lembaga_id')->references('id')->on('jenis_lembaga')->onDelete('set null');
            $table->integer('jumlah')->default(0);
            $table->unsignedBigInteger('dasar_hukum_id')->nullable();
            $table->foreign('dasar_hukum_id')->references('id')->on('dasar_hukum')->onDelete('set null');
            $table->integer('jumlah_pengurus')->default(0);
            $table->text('alamat_kantor')->nullable();
            $table->integer('jumlah_jenis_kegiatan')->default(0);
            $table->string('ruang_lingkup_kegiatan')->nullable();
            $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lembaga_kemasyarakatans');
    }
};
