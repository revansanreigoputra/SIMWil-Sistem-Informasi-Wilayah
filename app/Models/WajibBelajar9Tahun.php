<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WajibBelajar9Tahun extends Model
{
    use HasFactory;

    protected $table = 'wajib_belajar_9_tahuns';

    protected $fillable = [
        'desa_id',
        'tanggal',
        'penduduk',
        'masih_sekolah',
        'tidak_sekolah',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}
