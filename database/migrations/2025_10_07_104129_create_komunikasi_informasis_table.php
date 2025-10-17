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
        Schema::create('komunikasi_informasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->date('tanggal');
            $table->foreignId('kategori_id')
                ->constrained('kategori_komunikasis')
                ->onDelete('cascade');
            $table->foreignId('jenis_id')
                ->constrained('jenis_komunikasis')
                ->onDelete('cascade');
            $table->integer('jumlah')->default(0);
            $table->string('satuan')->nullable(); // contoh: Sinyal, Km, Unit
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komunikasi_informasis');
    }
};