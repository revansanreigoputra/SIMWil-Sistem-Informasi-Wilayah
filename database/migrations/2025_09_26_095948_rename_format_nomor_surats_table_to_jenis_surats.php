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
        Schema::table('format_nomor_surats', function (Blueprint $table) {
            Schema::rename('format_nomor_surats', 'jenis_surats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('format_nomor_surats', function (Blueprint $table) {
          Schema::rename('jenis_surats', 'format_nomor_surats');
        });
    }
};
