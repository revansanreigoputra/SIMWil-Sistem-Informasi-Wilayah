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
        Schema::table('jenis_surats', function (Blueprint $table) {
         $table->enum('mutasi_type', [
                'none',              
                'meninggal',         
                'pindah_keluar',    
                'mutasi_masuk_kk'   
            ])->default('none')->after('paragraf_penutup'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jenis_surats', function (Blueprint $table) {
            $table->dropColumn('mutasi_type');
        });
    }
};
