<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SektorPerdagangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'desa_id',
        'tanggal',
        'karyawan_perdagangan_hasil_bumi',
        'pengusaha_perdagangan_hasil_bumi',
        'buruh_perdagangan_hasil_bumi',
        'jumlah',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
