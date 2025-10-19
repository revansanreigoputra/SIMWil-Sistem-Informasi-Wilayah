<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perkelahian extends Model
{
    use HasFactory;

    protected $table = 'perkelahians';
    protected $primaryKey = 'id';

    /**
     * Kolom yang dapat diisi (mass assignable)
     */
    protected $fillable = [
        'id_desa',
        'tanggal',
        'kasus_tahun_ini',
        'kasus_korban_jiwa',
        'kasus_luka_parah',
        'kasus_kerugian_material',
        'pelaku_diadili',
    ];

    /**
     * Relasi ke model Desa
     * (diasumsikan kamu punya model bernama 'Desa')
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
