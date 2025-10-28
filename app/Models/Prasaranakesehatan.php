<?php

namespace App\Models;

use App\Models\MasterPotensi\JenisPrasaranaKesehatan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prasaranakesehatan extends Model
{
    use HasFactory;

    protected $table = 'prasaranakesehatans';
    protected $fillable = [
        'tanggal',
        'jenis_prasarana_kesehatan_id',
        'jumlah',
        'desa_id',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Relasi ke jenis prasarana kesehatan
     * Setiap prasarana kesehatan dimiliki oleh satu jenis prasarana
     */
    public function jenisPrasaranaKesehatan()
    {
        return $this->belongsTo(JenisPrasaranaKesehatan::class, 'jenis_prasarana_kesehatan_id');
    }

    /**
     * Relasi ke desa
     * Setiap prasarana kesehatan dimiliki oleh satu desa
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}