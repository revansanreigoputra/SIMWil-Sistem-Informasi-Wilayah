<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     
    public function up(): void
    {
        Schema::table('permohonans', function (Blueprint $table) {
         
            $table->foreignId('id_kop_templates')->constrained('kop_templates')->onDelete('cascade');
             
            $table->foreignId('id_format_nomor_surats')->constrained('format_nomor_surats')->onDelete('cascade');
             
            $table->foreignId('id_data_keluargas')->constrained('data_keluargas')->onDelete('cascade')->nullable();
             
            $table->foreignId('id_anggota_keluargas')->constrained('anggota_keluargas')->onDelete('cascade')->nullable();
             
            $table->foreignId('id_ttds')->constrained('ttds')->onDelete('cascade');
 
            $table->string('nomor_surat')->unique()->nullable();
            $table->date('tanggal_permohonan');
        });
    }
 
    public function down(): void
    {
        Schema::table('permohonans', function (Blueprint $table) {
            
            $table->dropForeign(['id_kop_templates']);
            $table->dropForeign(['id_format_nomor_surats']);
            $table->dropForeign(['id_data_keluargas']);
            $table->dropForeign(['id_anggota_keluargas']);
            $table->dropForeign(['id_ttds']);
            
         
            $table->dropColumn(['id_kop_templates', 'id_format_nomor_surats', 'id_data_keluargas', 'id_anggota_keluargas', 'id_ttds', 'nomor_surat', 'tanggal_permohonan']);
        });
    }
};