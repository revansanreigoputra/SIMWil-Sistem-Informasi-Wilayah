<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrasaranaPeribadatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'tempat_ibadah_id',
        'jumlah',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function tempatIbadah()
    {
        return $this->belongsTo(TempatIbadah::class);
    }
}