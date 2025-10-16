<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saranakesehatan extends Model
{
    use HasFactory;

    protected $table = 'saranakesehatans';
    protected $fillable = [
        'tanggal',
        'jskesehatan_id',
        'jumlah',
    ];
    
    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Relasi ke Jenis Sarana Kesehatan
     */
    public function jskesehatan()
    {
        return $this->belongsTo(Jskesehatan::class, 'jskesehatan_id');
    }
}