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
         Schema::table('data_keluargas', function (Blueprint $table) {
             
            $table->enum('status_kk_record', ['active', 'inactive_pending', 'closed'])
                  ->default('active')
                  ->after('nama_pengisi_id'); 
 
            $table->date('tanggal_inaktif')->nullable()->after('status_kk_record');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_keluargas', function (Blueprint $table) {
            $table->dropColumn(['status_kk_record', 'tanggal_inaktif']);
        });
    }
};
