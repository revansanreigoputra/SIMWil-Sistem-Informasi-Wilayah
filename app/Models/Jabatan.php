<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatans';

    protected $fillable = [
        'nama_jabatan',
        'desa_id',
    ];

    /**
     * Relasi ke Desa.
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    /**
     * Relasi ke Perangkat Desa.
     */
    public function perangkatDesa()
    {
        return $this->hasMany(PerangkatDesa::class);
    }
}