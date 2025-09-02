<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatans';

    protected $fillable = [
        'nama_kecamatan',
    ];

    /**
     * Relasi ke Desa (satu kecamatan punya banyak desa).
     */
    public function desas()
    {
        return $this->hasMany(Desa::class);
    }


}