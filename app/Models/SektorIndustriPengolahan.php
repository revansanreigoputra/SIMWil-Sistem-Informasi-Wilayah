<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SektorIndustriPengolahan extends Model
{
    use HasFactory;

    protected $fillable = [
    'desa_id',
    'tanggal',
    'jenis_industri',
    'nilai_produksi',
    'nilai_bahan_baku',
    'nilai_bahan_penolong',
    'biaya_antara',
    'jumlah_jenis_industri',
];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
