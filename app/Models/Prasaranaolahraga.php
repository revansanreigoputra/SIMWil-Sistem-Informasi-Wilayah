<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prasaranaolahraga extends Model
{
    use HasFactory;

    protected $table = 'prasaranaolahragas';
    protected $fillable = [
        'tanggal',
        'jpolahraga_id',
        'jumlah',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Relasi ke jenis prasarana olahraga
     * Setiap prasarana olahraga dimiliki oleh satu jenis prasarana
     */
    public function jpolahraga()
    {
        return $this->belongsTo(Jpolahraga::class, 'jpolahraga_id');
    }
}