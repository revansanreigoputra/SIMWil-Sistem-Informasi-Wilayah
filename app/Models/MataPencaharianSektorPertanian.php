<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPencaharianSektorPertanian extends Model
{
    use HasFactory;

    protected $table = 'mata_pencaharian_sektor_pertanian';

    protected $fillable = [
        'desa_id',
        'tanggal',
        'petani',
        'pemilik_usaha_tani',
        'buruh_tani',
        'jumlah',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
