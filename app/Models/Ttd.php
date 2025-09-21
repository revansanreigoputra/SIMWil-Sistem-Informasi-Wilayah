<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ttd extends Model
{
    use HasFactory;

    protected $table = 'ttds';

    protected $fillable = [
        'perangkat_desa_id',
        'nip',
        'nama',
        'jabatan',
        'status_aktif',
        'keterangan',
    ];

    protected $casts = [
        'status_aktif' => 'boolean',
    ];

    /**
     * Relasi ke PerangkatDesa
     */
    public function perangkatDesa()
    {
        return $this->belongsTo(PerangkatDesa::class);
    }
}