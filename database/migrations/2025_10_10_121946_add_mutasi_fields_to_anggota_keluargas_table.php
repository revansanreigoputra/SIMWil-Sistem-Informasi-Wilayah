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
            $table->enum('status_kehidupan', ['hidup', 'meninggal', 'pindah'])
                  ->default('hidup')
                  ->after('nama_lembaga');  
 
            $table->date('tanggal_mutasi')->nullable()->after('status_kehidupan');
 
            $table->text('catatan_mutasi')->nullable()->after('tanggal_mutasi');
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anggota_keluargas', function (Blueprint $table) {
           $table->dropColumn(['status_kehidupan', 'tanggal_mutasi', 'catatan_mutasi']);
        });
    }
};
