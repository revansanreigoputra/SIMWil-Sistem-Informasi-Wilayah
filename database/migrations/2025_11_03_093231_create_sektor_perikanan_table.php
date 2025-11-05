<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sektor_perikanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('nelayan')->nullable();
            $table->integer('pemilik_usaha_perikanan')->nullable();
            $table->integer('buruh_perikanan')->nullable();
            $table->integer('jumlah')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sektor_perikanan');
    }
};
