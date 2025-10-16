<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('status_gizi_balita', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('bergizi_buruk')->default(0);
            $table->integer('bergizi_baik')->default(0);
            $table->integer('bergizi_kurang')->default(0);
            $table->integer('bergizi_lebih')->default(0);
            $table->integer('jumlah_balita')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('status_gizi_balita');
    }
};
