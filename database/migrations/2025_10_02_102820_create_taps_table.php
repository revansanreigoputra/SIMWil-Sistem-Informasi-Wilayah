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
        Schema::create('taps', function (Blueprint $table) {
            $table->id();

            // Data Diri & Kontak - Sesuai form
            $table->string('nama');
            $table->enum('jns_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->text('alamat')->nullable();
            $table->string('kontak');
            $table->string('email')->unique();
            $table->string('tlp')->nullable();

            // Detail Penugasan - Sesuai form
            $table->date('tgl_tap');
            $table->year('tahun');
            $table->unsignedBigInteger('id_wk'); // Merepresentasikan 'wilayah_kerja'
            $table->unsignedBigInteger('id_ktk'); // Merepresentasikan 'kategori_keahlian'
            $table->unsignedBigInteger('id_prov'); // Merepresentasikan 'provinsi'
            $table->unsignedBigInteger('id_kabkot1'); // Merepresentasikan 'kabupaten1'
            $table->unsignedBigInteger('id_kabkot2')->nullable(); // Merepresentasikan 'kabupaten2'

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taps');
    }
};
