<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jlahans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->date('tanggal')->nullable();

            // TANAH SAWAH
            $table->double('sawah_irigasi_teknis')->default(0);
            $table->double('sawah_irigasi_setengah_teknis')->default(0);
            $table->double('sawah_tadah_hujan')->default(0);
            $table->double('sawah_pasang_surut')->default(0);
            $table->double('luas_tanah_sawah')->default(0);

            // TANAH BASAH
            $table->double('tanah_rawa')->default(0);
            $table->double('pasang_surut')->default(0);
            $table->double('lahan_gambut')->default(0);
            $table->double('situ_waduk_danau')->default(0);
            $table->double('luas_tanah_basah')->default(0);

            // TANAH KERING
            $table->double('tanah_ladang')->default(0);
            $table->double('pemukiman')->default(0);
            $table->double('pekarangan')->default(0);
            $table->double('luas_tanah_kering')->default(0);

            // TANAH PERKEBUNAN
            $table->double('perkebunan_rakyat')->default(0);
            $table->double('perkebunan_negara')->default(0);
            $table->double('perkebunan_swasta')->default(0);
            $table->double('perkebunan_perseorangan')->default(0);
            $table->double('luas_tanah_perkebunan')->default(0);

            // TANAH FASILITAS UMUM
            $table->double('tanah_bengkok')->default(0);
            $table->double('tanah_titi_sara')->default(0);
            $table->double('kebun_desa')->default(0);
            $table->double('sawah_desa')->default(0);
            $table->double('kas_desa')->default(0);
            $table->string('lokasi_tanah_kas_desa')->nullable(); //Di dalam desa, Di luar desa, Sebagian di luar 
            $table->double('lapangan_olahraga')->default(0);
            $table->double('perkantoran_pemerintahan')->default(0);
            $table->double('ruang_publik_taman')->default(0);
            $table->double('tpu')->default(0);
            $table->double('tps')->default(0);
            $table->double('bangunan_pendidikan')->default(0);
            $table->double('pertokoan')->default(0);
            $table->double('fasilitas_pasar')->default(0);
            $table->double('terminal')->default(0);
            $table->double('jalan')->default(0);
            $table->double('daerah_tangkapan_air')->default(0);
            $table->double('usaha_perikanan')->default(0);
            $table->double('aliran_stutet')->default(0);
            $table->double('luas_tanah_fasilitas_umum')->default(0);

            // TANAH HUTAN
            $table->double('hutan_lindung')->default(0);
            $table->double('hutan_produksi_tetap')->default(0);
            $table->double('hutan_produksi_terbatas')->default(0);
            $table->double('hutan_produksi')->default(0);
            $table->double('hutan_konservasi')->default(0);
            $table->double('hutan_adat')->default(0);
            $table->double('hutan_asli')->default(0);
            $table->double('hutan_sekunder')->default(0);
            $table->double('hutan_buatan')->default(0);
            $table->double('hutan_mangrove')->default(0);
            $table->double('suaka_alam')->default(0);
            $table->double('suaka_margasatwa')->default(0);
            $table->double('hutan_suaka')->default(0);
            $table->double('hutan_rakyat')->default(0);
            $table->double('luas_tanah_hutan')->default(0);

            // RINGKASAN
            $table->double('luas_desa')->default(0);
            $table->double('total_luas_entri_data')->default(0);
            $table->double('selisih_luas')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jlahans');
    }
};
