<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sarana_produksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->date('tanggal');

            // Semua kolom produksi diberi default(0) agar tidak error saat kosong
            $table->integer('produksi1')->default(0);
            $table->integer('produksi2')->default(0);
            $table->integer('produksi3')->default(0);
            $table->integer('produksi4')->default(0);
            $table->integer('produksi5')->default(0);
            $table->integer('produksi6')->default(0);
            $table->integer('produksi7')->default(0);
            $table->integer('produksi8')->default(0);
            $table->integer('produksi9')->default(0);
            $table->integer('produksi10')->default(0);
            $table->integer('produksi11')->default(0);
            $table->integer('produksi12')->default(0);
            $table->integer('produksi13')->default(0);

            // Jumlah total
            $table->integer('jumlah')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sarana_produksis');
    }
};
