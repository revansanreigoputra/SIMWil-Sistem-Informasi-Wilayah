<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RasioGuruDanMurid extends Model
{
    use HasFactory;

    protected $table = 'pe_rasio_guru';

    protected $fillable = [
        'id_desa',
        'tanggal',
        'guru_tk',
        'siswa_tk',
        'guru_sd',
        'siswa_sd',
        'guru_sltp',
        'siswa_sltp',
        'guru_slta',
        'siswa_slta',
        'guru_slb',
        'siswa_slb',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
