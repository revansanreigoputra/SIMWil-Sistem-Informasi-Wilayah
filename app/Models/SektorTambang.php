<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SektorTambang extends Model
{
    use HasFactory;

    protected $table = 'sektortambang';

    protected $fillable = [
        'desa_id',
        'tanggal',
        'penambang_galian_c',
        'pemilik_usaha_pertambangan',
        'buruh_usaha_pertambangan',
        'jumlah',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}
