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
        'nama_dusun',
        'bulan',
        'tahun',
        'nama_pengisi',
        'pekerjaan',
        'jabatan',
        'sumber_data',
    ];
}
