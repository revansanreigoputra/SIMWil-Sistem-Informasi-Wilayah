<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KualitasIbuHamil extends Model
{
    use HasFactory;

    protected $fillable = [
    'tanggal',
    'jumlah_ibu_hamil',
    'total_pemeriksaan',
    'jumlah_melahirkan',
    'jumlah_kematian_ibu',
    'jumlah_ibu_nifas_hidup',
    'periksa_posyandu',
    'periksa_puskesmas',
    'periksa_rumah_sakit',
    'periksa_dokter_praktek',
    'periksa_bidan_praktek',
    'periksa_dukun_terlatih',
    'jumlah_ibu_nifas',
];

}
