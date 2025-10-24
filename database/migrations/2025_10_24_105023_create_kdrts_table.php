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
        Schema::create('kdrts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_desa'); 
            $table->date('tanggal');
            $table->integer('jumlah_kasus_suami_terhadap_istri')->default(0);
            $table->integer('jumlah_kasus_istri_terhadap_suami')->default(0);
            $table->integer('jumlah_kasus_orangtua_terhadap_anak')->default(0);
            $table->integer('jumlah_kasus_anak_terhadap_orangtua')->default(0);
            $table->integer('jumlah_kasus_kepala_keluarga_terhadap_anggota_lainnya')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kdrts');
    }
};
