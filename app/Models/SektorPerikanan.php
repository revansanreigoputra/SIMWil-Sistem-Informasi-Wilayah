<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SektorPerikanan extends Model
{
    use HasFactory;

    protected $table = 'sektor_perikanan';
    protected $fillable = [
        'desa_id',
        'tanggal',
        'nelayan',
        'pemilik_usaha_perikanan',
        'buruh_perikanan',
        'jumlah',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
