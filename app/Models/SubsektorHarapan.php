<?php

namespace App\Models; // ← WAJIB ada

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; // ← Tambahkan baris ini!
use App\Models\Desa;

class SubsektorHarapan extends Model
{
    use HasFactory;

    protected $table = 'subsektor_harapans';

    protected $fillable = [
        'desa_id',
        'tanggal',
        'angka_harapan_hidup_desa',
        'angka_harapan_hidup_kabupaten',
        'angka_harapan_hidup_provinsi',
        'angka_harapan_hidup_nasional',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
