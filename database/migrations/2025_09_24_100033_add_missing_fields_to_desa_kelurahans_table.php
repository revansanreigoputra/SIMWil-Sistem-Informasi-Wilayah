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
        Schema::table('desa_kelurahans', function (Blueprint $table) {
            // Add missing fields that are used in the views
            $table->enum('pos_kamling', ['ada', 'tidak ada'])->nullable()->after('fasilitas_lainnya');
            $table->integer('jumlah_pos_kamling')->default(0)->after('pos_kamling');
            $table->enum('lapangan_olahraga', ['ada', 'tidak ada'])->nullable()->after('jumlah_pos_kamling');
            $table->enum('tempat_parkir', ['ada', 'tidak ada'])->nullable()->after('lapangan_olahraga');
            $table->year('tahun_pembangunan')->nullable()->after('tempat_parkir');
            $table->text('keterangan')->nullable()->after('tahun_pembangunan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('desa_kelurahans', function (Blueprint $table) {
            $table->dropColumn([
                'pos_kamling',
                'jumlah_pos_kamling',
                'lapangan_olahraga',
                'tempat_parkir',
                'tahun_pembangunan',
                'keterangan'
            ]);
        });
    }
};