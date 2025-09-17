<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKeluarga extends Model
{
    use HasFactory;

    protected $table = 'data_keluargas';

    protected $fillable = [
        'no_kk',
        'kepala_keluarga',
        'alamat',
        'rt',
        'rw',
        'dusun',
        'bulan',
        'tahun',
        'nama_pengisi',
        'pekerjaan',
        'jabatan',
        'sumber_data',
    ];

    /**
     * Mendefinisikan relasi "hasMany" ke model AnggotaKeluarga.
     * Satu kartu keluarga dapat memiliki banyak anggota keluarga.
     */
    public function anggotaKeluargas()
    {
        return $this->hasMany(AnggotaKeluarga::class, 'kartu_keluarga_id');
    }
}
