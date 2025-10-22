<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahMenurutLantai extends Model
{
    use HasFactory;

    protected $fillable = [
        'desa_id',
        'jenis_lantai_id',
        'tanggal',
        'jumlah',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function jenisLantai()
    {
        return $this->belongsTo(JenisLantai::class, 'jenis_lantai_id');
    }
}
