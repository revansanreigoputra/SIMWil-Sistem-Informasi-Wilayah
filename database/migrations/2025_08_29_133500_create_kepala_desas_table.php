<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kepala_desas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')
                ->constrained('desas')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('nama_kepala_desa', 100);
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('golongan_darah', 3)->nullable();
            $table->string('kontak', 20)->nullable();
            $table->text('alamat')->nullable();
            $table->string('masa_jabatan', 100)->nullable();
            $table->string('nama_istri', 100)->nullable();
            $table->integer('jumlah_anak')->default(0);
            $table->text('sambutan')->nullable();
            $table->string('foto', 255)->nullable();
            $table->timestamps();
        });

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepala_desas');
    }
};
