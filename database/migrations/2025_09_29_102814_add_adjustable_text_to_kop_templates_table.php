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
        Schema::table('kop_templates', function (Blueprint $table) {
            if (!Schema::hasColumn('kop_templates', 'paragraf_pembuka')) {
                $table->text('paragraf_pembuka')->nullable()->after('id');
            }
            if (!Schema::hasColumn('kop_templates', 'paragraf_penutup')) {
                $table->text('paragraf_penutup')->nullable()->after('paragraf_pembuka');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kop_templates', function (Blueprint $table) {
            $table->dropColumn(['paragraf_pembuka', 'paragraf_penutup']);
        });
    }
};
