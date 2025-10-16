<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrasaranaHiburan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'jphiburan_id',
        'jumlah',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function jphiburan()
    {
        return $this->belongsTo(JpHiburan::class, 'jphiburan_id');
    }
}