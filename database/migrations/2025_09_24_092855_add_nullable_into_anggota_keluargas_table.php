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
        Schema::table('anggota_keluargas', function (Blueprint $table) {
            $table->string('no_akta_kelahiran')->nullable()->change();
            $table->string('etnis')->nullable()->change();
            $table->unsignedBigInteger('kb_id')->nullable()->change();
            $table->unsignedBigInteger('cacat_id')->nullable()->change();
            $table->unsignedBigInteger('kedudukan_pajak_id')->nullable()->change();
            $table->unsignedBigInteger('lembaga_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anggota_keluargas', function (Blueprint $table) {
            // Note: Reverting to non-nullable might require handling existing null data.
            $table->string('no_akta_kelahiran')->nullable(false)->change();
            $table->string('etnis')->nullable(false)->change();
            $table->unsignedBigInteger('kb_id')->nullable(false)->change();
            $table->unsignedBigInteger('cacat_id')->nullable(false)->change();
            $table->unsignedBigInteger('kedudukan_pajak_id')->nullable(false)->change();
            $table->unsignedBigInteger('lembaga_id')->nullable(false)->change();
        });
    }
};