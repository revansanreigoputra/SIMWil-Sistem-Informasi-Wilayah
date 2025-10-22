<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prasaranapendidikan extends Model
{
    use HasFactory;

    protected $table = 'prasaranapendidikans';
    protected $fillable = [
        'desa_id',
        'tanggal',
        'jpgedung_id',
        'jumlah_sewa',
        'jumlah_milik_sendiri',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Relasi ke jenis gedung
     */
    public function jpgedung()
    {
        return $this->belongsTo(Jpgedung::class, 'jpgedung_id');
    }

    /**
     * Relasi ke Desa
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}