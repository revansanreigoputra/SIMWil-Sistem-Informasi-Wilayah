<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenurutSektorUsaha extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_desa',
        'tanggal',
        'kk',
        'anggota',
        'buruh',
        'anggota_buruh',
        'pendapatan',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
