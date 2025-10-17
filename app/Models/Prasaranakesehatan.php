<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prasaranakesehatan extends Model
{
    use HasFactory;

    protected $table = 'prasaranakesehatans';
    protected $fillable = [
        'tanggal',
        'jpkesehatan_id',
        'jumlah',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Relasi ke Jpkesehatan (many to one)
     */
    public function jpkesehatan()
    {
        return $this->belongsTo(Jpkesehatan::class, 'jpkesehatan_id');
    }
}