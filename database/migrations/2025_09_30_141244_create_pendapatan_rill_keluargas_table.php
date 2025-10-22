<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pendapatan_rill_keluargas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_desa')->constrained('desas')->cascadeOnDelete()->cascadeOnUpdate();

            $table->date('tanggal');
            $table->integer('kk'); // Jumlah kepala keluarga
            $table->integer('ak'); // Jumlah anggota keluarga
            $table->double('pendapatan_kk');
            $table->double('pendapatan_ak');
            $table->double('total1')->nullable(); // total pendapatan
            $table->double('total2')->nullable(); // pendapatan per anggota

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendapatan_rill_keluargas');
    }
};
