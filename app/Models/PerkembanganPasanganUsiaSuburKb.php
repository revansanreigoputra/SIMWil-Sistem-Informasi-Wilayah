<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerkembanganPasanganUsiaSuburKb extends Model
{
    use HasFactory;

    protected $table = 'perkembangan_pasangan_usia_subur_dan_kb';

    protected $fillable = [
        'desa_id',
        'tanggal',
        'remaja_putri_12_17',
        'perempuan_usia_subur_15_49',
        'wanita_kawin_muda_kurang_16',
        'pasangan_usia_subur',
        'pengguna_kontrasepsi_suntik',
        'pengguna_kontrasepsi_spiral',
        'pengguna_kontrasepsi_kondom',
        'pengguna_kontrasepsi_pil',
        'pengguna_kontrasepsi_vasektomi',
        'pengguna_kontrasepsi_tubektomi',
        'pengguna_kb_alamiah',
        'pengguna_kb_tradisional',
        'pengguna_kontrasepsi_lainnya',
        'akseptor_kb',
        'pus_tidak_menggunakan_kb'
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
