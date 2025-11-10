<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sikapdanmental extends Model
{
    use HasFactory;

    protected $table = 'sikapdanmentals';

    protected $fillable = [
        'desa_id',
        'tanggal',
        'jumlah_pungutan_gelandangan',
        'jumlah_pungutan_terminal_pelabuhan_pasar',
        'permintaan_sumbangan_perorangan',
        'permintaan_sumbangan_terorganisir',
        'praktik_jalan_pintas',
        'jenis_pungutan_rt_rw',
        'jenis_pungutan_desa_kelurahan',
        'kasus_aparat_rt_rw',
        'dipindah_karena_kasus',
        'diberhentikan_kasus',
        'dimutasi_kasus',
        'masyarakat_biaya_pelayanan',
        'pelayanan_gratis_aparat',
        'keluhan_pelayanan',
        'hiburan_inisiatif_masyarakat',
        'kurang_toleran',
        'wilayah_sangat_luas',
        'lahan_terlantar',
        'lahan_perkarangan_tidak_dimanfaatkan',
        'tidur_milir_tidak_dimanfaatkan',
        'petani_gagal_panen',
        'nelayan_tidak_melayat',
        'cari_pekerjaan_luar_desa',
        'cari_pekerjaan_kota_besar',
        'rayakan_pesta',
        'menuntut_kebutuhan_pokok',
        'mencari_bahan_pengganti_pangan',
        'pemotongan_hewan_besar',
        'berdemo',
        'terprovokasi_isu',
        'bermusyawarah',
        'masyarakat_apatih',
        'aparat_kurang_menangani',
    ];
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
