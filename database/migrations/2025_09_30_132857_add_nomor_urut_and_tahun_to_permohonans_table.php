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
            $table->unsignedSmallInteger('nomor_urut')->default(0)->after('nomor_surat');
          
            $table->unsignedSmallInteger('tahun')->after('nomor_urut');
        });
    }

    public function down(): void
    {
        Schema::table('permohonans', function (Blueprint $table) {
            $table->dropColumn(['nomor_urut', 'tahun']);
        });
    }
};
