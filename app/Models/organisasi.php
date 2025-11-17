<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class organisasi extends Model
{
    use HasFactory;

    // Nama tabel (opsional, kalau tidak pakai default plural)
    protected $table = 'organisasis';

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'desa_id',
        'tanggal',
        'jenis_organisasi',
        'kepengurusan',
        'buku_administrasi',
        'jumlah_kegiatan',
        'dasar_hukum_pembentukan',
    ];
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}

