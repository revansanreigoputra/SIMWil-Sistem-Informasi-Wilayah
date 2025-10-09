<?php

namespace App\Models;


use App\Models\{
    Desa,
    Kecamatan,
    AnggotaKeluarga,
    PerangkatDesa
};
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
        'desa_id',
        'rt',
        'rw',
        'kecamatan_id',
        'nama_pengisi_id'
    ];
     
    public function perangkatDesas()
    {
        return $this->belongsTo(PerangkatDesa::class, 'nama_pengisi_id');
    }
    public function desas()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
    public function kecamatans()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }

    public function anggotaKeluarga()
    {
        return $this->hasMany(AnggotaKeluarga::class, 'data_keluarga_id');
    }
}
