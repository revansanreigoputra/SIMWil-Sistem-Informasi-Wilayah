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
        Schema::table('perangkat_desas', function (Blueprint $table) {
           $table->foreignId('pendidikan_id')
           ->nullable()->constrained('pendidikans')
           ->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perangkat_desas', function (Blueprint $table) {
            $table->dropForeign(['pendidikan_id']);
            $table->dropColumn('pendidikan_id');
        });
    }
};
