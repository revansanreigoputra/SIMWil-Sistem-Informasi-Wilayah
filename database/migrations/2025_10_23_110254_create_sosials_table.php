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
        Schema::create('sosials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal'); 
            $table->integer('jumlah_anak_remaja_preman_pengangguran')->nullable();
            $table->integer('jumlah_gelandangan')->nullable();
            $table->integer('jumlah_pengemis_jalanan')->nullable();
            $table->integer('jumlah_anak_jalanan_terlantar')->nullable();
            $table->integer('jumlah_lansia_terlantar')->nullable();
            $table->integer('jumlah_orang_gila_stress_cacat_mental')->nullable();
            $table->integer('jumlah_orang_cacat_fisik')->nullable();
            $table->integer('jumlah_orang_kelainan_kulit')->nullable();
            $table->integer('jumlah_tidur_kolong_jembatan')->nullable();
            $table->integer('jumlah_rumah_kawasan_kumuh')->nullable();
            $table->integer('jumlah_panti_jompo')->nullable();
            $table->integer('jumlah_panti_asuhan_anak')->nullable();
            $table->integer('jumlah_rumah_singgah_jalanan')->nullable();
            $table->integer('jumlah_penghuni_jalur_hijau_taman')->nullable();
            $table->integer('jumlah_penghuni_bantaran_sungai')->nullable();
            $table->integer('jumlah_penghuni_pinggiran_rel')->nullable();
            $table->integer('jumlah_penghuni_liar_lahan_fasilitas_umum')->nullable();
            $table->integer('jumlah_kelompok_terasing_terlantar_primitif')->nullable();
            $table->integer('jumlah_anak_yatim_0_18')->nullable();
            $table->integer('jumlah_anak_piatu_0_18')->nullable();
            $table->integer('jumlah_anak_yatim_piatu_0_18')->nullable();
            $table->integer('jumlah_janda')->nullable();
            $table->integer('jumlah_duda')->nullable();
            $table->integer('jumlah_anak_tidak_sekolah_sd')->nullable();
            $table->integer('jumlah_anak_tidak_sekolah_sltp')->nullable();
            $table->integer('jumlah_anak_tidak_sekolah_slta')->nullable();
            $table->integer('jumlah_anak_bekerja_membantu_keluarga')->nullable();
            $table->integer('jumlah_perempuan_kepala_keluarga')->nullable();
            $table->integer('jumlah_penduduk_eks_napi')->nullable();
            $table->integer('jumlah_rentan_banjir')->nullable();
            $table->integer('jumlah_rentan_gunung_berapi')->nullable();
            $table->integer('jumlah_rentan_tsunami')->nullable();
            $table->integer('jumlah_rentan_gempa_bumi')->nullable();
            $table->integer('jumlah_rentan_kebakaran_rumah')->nullable();
            $table->integer('jumlah_rentan_kekeringan')->nullable();
            $table->integer('jumlah_rentan_longsor')->nullable();
            $table->integer('jumlah_rentan_kebakaran_hutan')->nullable();
            $table->integer('jumlah_rentan_kelaparan')->nullable();
            $table->integer('jumlah_rentan_air_bersih')->nullable();
            $table->integer('jumlah_rentan_lahan_kritis')->nullable();
            $table->integer('jumlah_rentan_padat_kumuh')->nullable();
            $table->integer('jumlah_warga_pendatang_tanpa_identitas')->nullable();
            $table->integer('jumlah_warga_pendatang_pekerja_musiman')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sosials');
    }
};
