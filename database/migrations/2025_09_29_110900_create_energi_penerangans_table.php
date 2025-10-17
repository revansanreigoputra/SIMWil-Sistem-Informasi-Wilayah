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
        Schema::create('energi_penerangans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->unsignedInteger('listrik_pln')->default(0);
            $table->unsignedInteger('diesel_umum')->default(0);
            $table->unsignedInteger('genset_pribadi')->default(0);
            $table->unsignedInteger('lampu_minyak')->default(0);
            $table->unsignedInteger('kayu_bakar')->default(0);
            $table->unsignedInteger('batu_bara')->default(0);
            $table->unsignedInteger('tanpa_penerangan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('energi_penerangans');
    }
};