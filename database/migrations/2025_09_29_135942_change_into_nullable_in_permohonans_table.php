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
            // Drop existing foreign key constraints first (if they exist)
            // Replace column names below with your actual foreign key constraint names if different
            $table->dropForeign(['id_anggota_keluargas']);
            $table->dropForeign(['id_data_keluargas']);

            // 1. Make the columns nullable
            // Using unsignedBigInteger for consistency if they are foreign keys
            $table->unsignedBigInteger('id_anggota_keluargas')->nullable()->change();
            $table->unsignedBigInteger('id_data_keluargas')->nullable()->change();

            // 2. Re-add the foreign key constraints with the nullable property
            $table->foreign('id_anggota_keluargas')->references('id')->on('anggota_keluargas')->onDelete('set null');
            $table->foreign('id_data_keluargas')->references('id')->on('data_keluargas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permohonans', function (Blueprint $table) {
            // Drop foreign keys
            $table->dropForeign(['id_anggota_keluargas']);
            $table->dropForeign(['id_data_keluargas']);
            
            // Revert them to NOT NULL (default behavior)
            // Note: Reverting MAY require defining the columns again without ->nullable()
            $table->unsignedBigInteger('id_anggota_keluargas')->nullable(false)->change();
            $table->unsignedBigInteger('id_data_keluargas')->nullable(false)->change();

            // Re-add foreign keys
            $table->foreign('id_anggota_keluargas')->references('id')->on('anggota_keluargas');
            $table->foreign('id_data_keluargas')->references('id')->on('data_keluargas');
        });
    }
};