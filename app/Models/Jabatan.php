<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatans';

    protected $fillable = [
        'nama_jabatan',
    ];

    /**
     * Relasi ke Perangkat Desa.
     */
    public function perangkatDesa()
    {
        return $this->hasMany(PerangkatDesa::class);
    }
}