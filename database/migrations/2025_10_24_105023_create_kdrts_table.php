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
           $table->foreignId('desa_id')->constrained('desas')->onUpdate('cascade')->onDelete('cascade'); 
            $table->date('tanggal');
            $table->integer('jumlah_kasus_suami_terhadap_istri')->nullable();
            $table->integer('jumlah_kasus_istri_terhadap_suami')->nullable();
            $table->integer('jumlah_kasus_orangtua_terhadap_anak')->nullable();
            $table->integer('jumlah_kasus_anak_terhadap_orangtua')->nullable();
            $table->integer('jumlah_kasus_kepala_keluarga_terhadap_anggota_lainnya')->nullable();
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
