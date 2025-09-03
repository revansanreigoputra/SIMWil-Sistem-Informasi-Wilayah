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
        Schema::create('anggota_keluargas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_keluarga_id');
            $table->integer('no_urut')->unique();
            $table->string('nik', 16)->unique();
            $table->string('no_akta_kelahiran')->unique();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->unsignedBigInteger('hubungan_keluarga_id');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->date('tanggal_pencatatan')->nullable();
            $table->enum('status_perkawinan', ['Belum Menikah', 'Menikah', 'Cerai']);
            $table->unsignedBigInteger('agama_id');
            $table->unsignedBigInteger('golongan_darah_id');
            $table->unsignedBigInteger('kewarganegaraan_id');
            $table->string('etnis');
            $table->unsignedBigInteger('pendidikan_id');
            $table->unsignedBigInteger('mata_pencaharian_id');
            $table->string('nama_orang_tua');
            $table->unsignedBigInteger('kb_id');
            $table->unsignedBigInteger('cacat_id');
            $table->unsignedBigInteger('kedudukan_pajak_id');
            $table->unsignedBigInteger('lembaga_id');

            // relasi
            $table->foreign('data_keluarga_id')->references('id')->on('data_keluargas')->onDelete('cascade');
            $table->foreign('hubungan_keluarga_id')->references('id')->on('hubungan_keluarga');
            $table->foreign('agama_id')->references('id')->on('agama');
            $table->foreign('golongan_darah_id')->references('id')->on('golongan_darahs');
            $table->foreign('kewarganegaraan_id')->references('id')->on('kewarganegaraans');
            $table->foreign('pendidikan_id')->references('id')->on('pendidikans');
            $table->foreign('mata_pencaharian_id')->references('id')->on('mata_pencaharians');
            $table->foreign('kb_id')->references('id')->on('kb');
            $table->foreign('cacat_id')->references('id')->on('cacats');
            $table->foreign('kedudukan_pajak_id')->references('id')->on('kedudukan_pajaks');
            $table->foreign('lembaga_id')->references('id')->on('lembagas');    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_keluargas');
    }
};
