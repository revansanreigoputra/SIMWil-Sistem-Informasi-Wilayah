<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tingkat_pendidikan_masyarakats', function (Blueprint $table) {
            $table->id();

            // relasi hanya ke desa
            $table->foreignId('desa_id')
                ->constrained('desas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            // kolom utama
            $table->date('tanggal'); // ✅ ubah dari tahun (integer) jadi date agar bisa pilih dari kalender
            $table->integer('tidak_tamat_sd')->nullable();
            $table->integer('sd')->nullable();
            $table->integer('sltp')->nullable();
            $table->integer('slta')->nullable();
            $table->integer('diploma')->nullable();
            $table->integer('sarjana')->nullable();

            // persentase
            $table->double('p_buta', 8, 2)->nullable();
            $table->double('p_tamat', 8, 2)->nullable();
            $table->double('p_cacat', 8, 2)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tingkat_pendidikan_masyarakats');
    }
};
