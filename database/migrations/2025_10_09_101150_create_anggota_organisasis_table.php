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
        Schema::create('anggota_organisasis', function (Blueprint $table) {
            // Use the standard 'id()' for the primary key
            $table->id(); 

            // Foreign Keys - Consistent naming and reference to pluralized tables
            $table->foreignId('perangkat_desa_id')
                ->constrained('perangkat_desas') // Reference the plural 'perangkat_desas'
                ->cascadeOnDelete()
                ->cascadeOnUpdate(); // Added cascadeOnUpdate for consistency

            $table->foreignId('jabatan_id')
                ->constrained('jabatans') // Reference the plural 'jabatans'
                ->cascadeOnDelete()
                ->cascadeOnUpdate(); // Added cascadeOnUpdate for consistency
            
            // Status and Notes
            $table->enum('status_jabatan', [
                'Ada dan Aktif',
                'Ada dan Tidak Aktif',
                'Tidak Ada',
                'Aktif',
                'Pasif',
                'Pasif (Dusun)', // Added 'Pasif (Dusun)' for clarity based on original image
                'Aktif (Dusun)'  // Added 'Aktif (Dusun)' for clarity based on original image
            ])->default('Tidak Ada');
            $table->text('keterangan_tambahan')->nullable();

            $table->timestamps();

            // Unique Constraint: Corrected to use the new foreign key column names
            // This ensures a specific person can only hold a specific role once at a time.
            $table->unique(['perangkat_desa_id', 'jabatan_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_organisasis');
    }
};