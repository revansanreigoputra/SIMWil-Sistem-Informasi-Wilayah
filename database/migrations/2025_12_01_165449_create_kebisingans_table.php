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
        Schema::create('kebisingans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->date('tanggal');
            $table->enum('tingkat_kebisingan', ['ringan', 'sedang', 'tinggi']);
            $table->string('sumber_kebisingan');
            $table->enum('ekses_dampak_kebisingan', ['ya', 'tidak']);
            $table->text('efek_terhadap_penduduk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kebisingans');
    }
};
