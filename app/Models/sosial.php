<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sosial extends Model
{
    use HasFactory;

    protected $table = 'sosials';

    protected $fillable = [
        'desa_id',
        'tanggal',
        'jumlah_anak_remaja_preman_pengangguran',
        'jumlah_gelandangan',
        'jumlah_pengemis_jalanan',
        'jumlah_anak_jalanan_terlantar',
        'jumlah_lansia_terlantar',
        'jumlah_orang_gila_stress_cacat_mental',
        'jumlah_orang_cacat_fisik',
        'jumlah_orang_kelainan_kulit',
        'jumlah_tidur_kolong_jembatan',
        'jumlah_rumah_kawasan_kumuh',
        'jumlah_panti_jompo',
        'jumlah_panti_asuhan_anak',
        'jumlah_rumah_singgah_jalanan',
        'jumlah_penghuni_jalur_hijau_taman',
        'jumlah_penghuni_bantaran_sungai',
        'jumlah_penghuni_pinggiran_rel',
        'jumlah_penghuni_liar_lahan_fasilitas_umum',
        'jumlah_kelompok_terasing_terlantar_primitif',
        'jumlah_anak_yatim_0_18',
        'jumlah_anak_piatu_0_18',
        'jumlah_anak_yatim_piatu_0_18',
        'jumlah_janda',
        'jumlah_duda',
        'jumlah_anak_tidak_sekolah_sd',
        'jumlah_anak_tidak_sekolah_sltp',
        'jumlah_anak_tidak_sekolah_slta',
        'jumlah_anak_bekerja_membantu_keluarga',
        'jumlah_perempuan_kepala_keluarga',
        'jumlah_penduduk_eks_napi',
        'jumlah_rentan_banjir',
        'jumlah_rentan_gunung_berapi',
        'jumlah_rentan_tsunami',
        'jumlah_rentan_gempa_bumi',
        'jumlah_rentan_kebakaran_rumah',
        'jumlah_rentan_kekeringan',
        'jumlah_rentan_longsor',
        'jumlah_rentan_kebakaran_hutan',
        'jumlah_rentan_kelaparan',
        'jumlah_rentan_air_bersih',
        'jumlah_rentan_lahan_kritis',
        'jumlah_rentan_padat_kumuh',
        'jumlah_warga_pendatang_tanpa_identitas',
        'jumlah_warga_pendatang_pekerja_musiman',
    ];

    /**
     * Relasi ke tabel desa (jika ada model Desa)
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
