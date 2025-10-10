<?php

namespace App\Models;
use App\Models\MasterDDK\Pendidikan;
use App\Models\Desa;
use App\Models\Jabatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PerangkatDesa extends Model
{
    use HasFactory;

    protected $table = 'perangkat_desas';

    protected $fillable = [
        'desa_id',
        'jabatan_id',
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'golongan_darah',
        'kontak',
        'alamat',
        'masa_jabatan',
        'nama_pasangan',
        'jumlah_anak',
        'sambutan',
        'foto',
        'pendidikan_id',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    /**
     * Relasi ke Desa (satu perangkat desa untuk satu desa).
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class);
    }

}



