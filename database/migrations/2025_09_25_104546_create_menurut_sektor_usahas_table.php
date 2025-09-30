<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menurut_sektor_usahas', function (Blueprint $table) {
            $table->id();
            $table->string('sektor'); // nama sektor usaha (misal pertanian, industri, jasa)
            $table->integer('tahun');
            $table->bigInteger('jumlah'); // jumlah pendapatan/kontribusi
            $table->string('satuan')->nullable(); // misalnya: Rupiah, %
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menurut_sektor_usahas');
    }
};
