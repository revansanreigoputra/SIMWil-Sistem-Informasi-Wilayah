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
              
            $table->text('konten_template')->nullable();
        });
        
        // Perbarui foreign key di tabel permohonan_surats
        if (Schema::hasTable('permohonan_surats')) {
            Schema::table('permohonan_surats', function (Blueprint $table) {
                // Ubah nama kolom foreign key
 
                $table->renameColumn('id_format_nomor_surats', 'id_jenis_surat');
                
         });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jenis_surats', function (Blueprint $table) {

            $table->dropColumn('konten_template');
        });
        

        if (Schema::hasTable('permohonan_surats')) {
            Schema::table('permohonan_surats', function (Blueprint $table) {
                 $table->renameColumn('id_jenis_surat', 'id_format_nomor_surats');
            });
        }
    }
};
