<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('anggota_keluargas', function (Blueprint $table) { 
            $table->dropUnique('anggota_keluargas_no_urut_unique');  
            $table->unique(['data_keluarga_id', 'no_urut'], 'anggota_keluargas_kk_urut_unique');
        });
    }

    public function down()
    {
        Schema::table('anggota_keluargas', function (Blueprint $table) {
            // Rollback: Hapus batasan komposit saat rollback
            $table->dropUnique('anggota_keluargas_kk_urut_unique');
            
            // (Opsional) Tambahkan kembali index lama jika itu diperlukan untuk tujuan lain
            // $table->unique('no_urut'); 
        });
    }
};
