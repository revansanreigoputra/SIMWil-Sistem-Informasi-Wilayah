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
         
            $table->foreignId('kop_template_id')
                  ->nullable() // Allow null only if a template can exist without a default Kop
                  ->constrained('kop_templates'); // Links to the 'kop_templates' table 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jenis_surats', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropConstrainedForeignId('kop_template_id'); 
        });
    }
};
