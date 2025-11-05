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
        Schema::create('p_etnis_sukus', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('etnis_id')->constrained('etnis')->onDelete('cascade');
            $table->integer('jumlah_laki_laki');
            $table->integer('jumlah_perempuan');
            $table->integer('jumlah_total');
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('p_etnis_sukus', function (Blueprint $table) {
            $table->dropForeign(['etnis_id']);
            $table->dropColumn('etnis_id');
            $table->string('etnis_suku'); // Re-add if needed for rollback, though typically not done this way
        });
        Schema::dropIfExists('p_etnis_sukus');
    }
};
