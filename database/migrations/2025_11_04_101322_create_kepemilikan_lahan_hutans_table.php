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
        Schema::create('kepemilikan_lahan_hutans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->double('milik_negara', 15, 2)->default(0);
            $table->double('milik_adat_ulayat', 15, 2)->default(0);
            $table->double('perhutani_instansi_sektoral', 15, 2)->default(0);
            $table->double('milik_masyarakat_perorangan', 15, 2)->default(0);
            $table->double('luas_hutan', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepemilikan_lahan_hutans');
    }
};
