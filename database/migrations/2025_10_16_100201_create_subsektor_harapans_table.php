<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('subsektor_harapans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('angka_harapan_hidup_desa')->nullable();
            $table->integer('angka_harapan_hidup_kabupaten')->nullable();
            $table->integer('angka_harapan_hidup_provinsi')->nullable();
            $table->integer('angka_harapan_hidup_nasional')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subsektor_harapans');
    }
};
