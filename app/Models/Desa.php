<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $table = 'desa';

    protected $fillable = [
        'kode_desa',
        'nama_desa',
        'alamat_kantor',
        'kepala_desa_id',
        'email',
        'telepon',
        'website',
        'logo',
        'latitude',
        'longitude',
    ];

    /**
     * Relasi ke Kepala Desa (satu desa punya satu kepala desa).
     */
    public function kepalaDesa()
    {
        return $this->belongsTo(KepalaDesa::class, 'kepala_desa_id');
    }
}
