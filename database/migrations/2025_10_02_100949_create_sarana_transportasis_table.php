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
        Schema::create('sarana_transportasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal');
            $table->unsignedBigInteger('kategori_prasarana_transportasi_lainnya_id');
            $table->foreign('kategori_prasarana_transportasi_lainnya_id', 'sarana_transportasi_kategori_foreign')
                ->references('id')
                ->on('kategori_prasarana_transportasi_lainnya')
                ->onDelete('cascade');

            $table->unsignedBigInteger('jenis_prasarana_transportasi_lainnya_id');
            $table->foreign('jenis_prasarana_transportasi_lainnya_id', 'sarana_transportasi_jenis_foreign')
                ->references('id')
                ->on('jenis_prasarana_transportasi_lainnya')
                ->onDelete('cascade');
            $table->integer('jumlah')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sarana_transportasis');
    }
};