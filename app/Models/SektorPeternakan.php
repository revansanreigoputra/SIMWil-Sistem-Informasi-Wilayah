<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SektorPeternakan extends Model
{
    use HasFactory;

    protected $table = 'sektor_peternakan';
    protected $fillable = [
        'desa_id',
        'tanggal',
        'peternakan_perorangan',
        'pemilik_usaha_peternakan',
        'buruh_peternakan',
        'jumlah',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}
