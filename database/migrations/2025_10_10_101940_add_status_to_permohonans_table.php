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
        Schema::table('permohonans', function (Blueprint $table) { 
            $table->enum('status', ['belum_diverifikasi', 'diverifikasi', 'ditolak', 'sudah_diambil'])
                ->default('belum_diverifikasi');  
 
            $table->text('catatan_penolakan')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permohonans', function (Blueprint $table) {
             $table->dropColumn(['status', 'catatan_penolakan']);
        });
    }
};
