<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $table = 'desas';

    protected $fillable = [
        'kecamatan_id',
        'nama_desa',
        'status',
        'kelurahan_terluar',
        'tipologi',
        'luas',
        'bujur',
        'lintang',
        'ketinggian',
        'kode_pum',
    ];

    /**
     * Relasi ke Kecamatan.
     */
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    /**
     * Relasi ke Perangkat Desa (satu desa punya banyak perangkat desa).
     */
    public function perangkatDesas()
    {
        return $this->hasMany(PerangkatDesa::class);
    }


}