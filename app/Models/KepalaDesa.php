<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepalaDesa extends Model
{
    use HasFactory;

    protected $table = 'kepala_desas';

    protected $fillable = [
        'nama_kepala_desa',
        'tanggal_lahir',
        'jenis_kelamin',
        'golongan_darah',
        'kontak',
        'alamat',
        'masa_jabatan',
        'nama_istri',
        'jumlah_anak',
        'sambutan',
        'foto',
    ];

    /**
     * Relasi ke Desa (satu kepala desa untuk satu desa).
     */
    public function desa()
    {
        return $this->hasOne(Desa::class, 'kepala_desa_id');
    }
}
