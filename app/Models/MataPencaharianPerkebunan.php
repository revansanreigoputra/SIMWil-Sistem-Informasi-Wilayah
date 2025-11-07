<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPencaharianPerkebunan extends Model
{
    use HasFactory;

    protected $fillable = [
        'desa_id',
        'tanggal',
        'karyawan_perusahaan_perkebunan',
        'pemilik_usaha_perkebunan',
        'buruh_perkebunan',
        'jumlah',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
