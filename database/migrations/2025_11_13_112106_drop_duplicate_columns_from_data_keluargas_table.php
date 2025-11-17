<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_keluargas', function (Blueprint $table) {
            
            // STEP 1: Drop all the foreign key constraints first
            $table->dropForeign(['hubungan_keluarga_id']);
            $table->dropForeign(['agama_id']);
            $table->dropForeign(['golongan_darah_id']);
            $table->dropForeign(['kewarganegaraan_id']);
            $table->dropForeign(['pendidikan_id']);
            $table->dropForeign(['mata_pencaharian_id']);
            $table->dropForeign(['kb_id']);
            $table->dropForeign(['cacat_id']);
            $table->dropForeign(['kedudukan_pajak_id']);
            $table->dropForeign(['lembaga_id']);
            // Note: We are dropping by column name, which is easiest.
            // If any of these fail, we may need to use the full constraint name.

            // STEP 2: Now drop the columns
            $table->dropColumn([
                'nik',
                'no_akta_kelahiran',
                'jenis_kelamin',
                'hubungan_keluarga_id',
                'tempat_lahir',
                'tanggal_lahir',
                'tanggal_pencatatan',
                'status_perkawinan',
                'agama_id',
                'golongan_darah_id',
                'kewarganegaraan_id',
                'etnis',
                'pendidikan_id',
                'mata_pencaharian_id',
                'nama_orang_tua',
                'kb_id',
                'cacat_id',
                'nama_cacat',
                'kedudukan_pajak_id',
                'lembaga_id',
                'nama_lembaga'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_keluargas', function (Blueprint $table) {
            // STEP 1: Re-add all the columns
            $table->string('nik', 16)->nullable();
            $table->string('no_akta_kelahiran')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->unsignedBigInteger('hubungan_keluarga_id')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->date('tanggal_pencatatan')->nullable();
            $table->string('status_perkawinan')->nullable();
            $table->unsignedBigInteger('agama_id')->nullable();
            $table->unsignedBigInteger('golongan_darah_id')->nullable();
            $table->unsignedBigInteger('kewarganegaraan_id')->nullable();
            $table->string('etnis')->nullable();
            $table->unsignedBigInteger('pendidikan_id')->nullable();
            $table->unsignedBigInteger('mata_pencaharian_id')->nullable();
            $table->string('nama_orang_tua')->nullable();
            $table->unsignedBigInteger('kb_id')->nullable();
            $table->unsignedBigInteger('cacat_id')->nullable();
            $table->string('nama_cacat')->nullable();
            $table->unsignedBigInteger('kedudukan_pajak_id')->nullable();
            $table->unsignedBigInteger('lembaga_id')->nullable();
            $table->string('nama_lembaga')->nullable();

            // STEP 2: Re-add all the foreign keys
            // (Based on your validation rules, your tables are singular)
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
        });
    }
};