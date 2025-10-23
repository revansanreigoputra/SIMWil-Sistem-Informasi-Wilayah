<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisAtap extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_jenis_atap',
    ];

    // Relasi ke RumahMenurutAtap
    public function rumahMenurutAtap()
    {
        return $this->hasMany(RumahMenurutAtap::class, 'id_aset_atap');
    }
}
