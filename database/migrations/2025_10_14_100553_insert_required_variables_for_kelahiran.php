<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // JSON yang mendefinisikan custom fields untuk input data bayi
        $kelahiranVariables = json_encode([
            ["key" => "nama", "label" => "Nama Bayi", "type" => "text"],
            ["key" => "nik", "label" => "NIK Bayi (16 Digit/Opsional)", "type" => "text", "required" => false],
            ["key" => "tempat_lahir", "label" => "Tempat Lahir", "type" => "text"],
            ["key" => "tanggal_lahir", "label" => "Tanggal Lahir", "type" => "date"],
            ["key" => "jenis_kelamin", "label" => "Jenis Kelamin", "type" => "select", "options" => ["LAKI-LAKI", "PEREMPUAN"]],
            ["key" => "hubungan_keluarga_id", "label" => "Hubungan Keluarga (Cth: Anak)", "type" => "select_db", "model" => "HubunganKeluarga"],
            ["key" => "no_akta_kelahiran", "label" => "Nomor Akta Kelahiran", "type" => "text", "required" => false],
            ["key" => "tanggal_pencatatan", "label" => "Tanggal Pencatatan", "type" => "date"],
            ["key" => "agama_id", "label" => "Agama", "type" => "select_db", "model" => "Agama"],
            ["key" => "golongan_darah_id", "label" => "Golongan Darah", "type" => "select_db", "model" => "GolonganDarah"],
            ["key" => "kewarganegaraan_id", "label" => "Kewarganegaraan", "type" => "select_db", "model" => "Kewarganegaraan"],
            ["key" => "etnis", "label" => "Etnis/Suku", "type" => "text", "required" => false],
            ["key" => "pendidikan_id", "label" => "Pendidikan Terakhir", "type" => "select_db", "model" => "Pendidikan"],
            ["key" => "mata_pencaharian_id", "label" => "Mata Pencaharian", "type" => "select_db", "model" => "MataPencaharian"],
            ["key" => "status_perkawinan", "label" => "Status Perkawinan", "type" => "select", "options" => ["BELUM KAWIN"]],
        ]);

        DB::table('jenis_surats')
            ->where('mutasi_type', 'pencatatan_kelahiran')
            ->update([
                'required_variables' => $kelahiranVariables,
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('jenis_surats')
            ->where('mutasi_type', 'pencatatan_kelahiran')
            ->update([
                'required_variables' => null,
            ]);
    }
};
