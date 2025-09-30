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
            // Add the nama_cacat column after cacat_id
            $table->string('nama_cacat')->nullable()->after('cacat_id');
            
            // Add the nama_lembaga column after lembaga_id
            $table->string('nama_lembaga')->nullable()->after('lembaga_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anggota_keluargas', function (Blueprint $table) {
            // Drop the new columns in the reverse migration
            $table->dropColumn('nama_cacat');
            $table->dropColumn('nama_lembaga');
        });
    }
};