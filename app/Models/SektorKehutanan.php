<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SektorKehutanan extends Model
{
    use HasFactory;

    protected $table = 'sektor_kehutanan';

    protected $fillable = [
        'desa_id',
        'tanggal',
        'pengumpul_hasil_hutan',
        'pemilik_usaha_hasil_hutan',
        'buruh_usaha_hasil_hutan',
        'jumlah',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
