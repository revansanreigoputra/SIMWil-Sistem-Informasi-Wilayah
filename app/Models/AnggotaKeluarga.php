<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaKeluarga extends Model
{
    use HasFactory;

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kartu_keluarga_id',
        'no_urut',
        'nik',
        'nama_lengkap',
        'no_akte',
        'jenis_kelamin',
        'hubungan_keluarga',
        'tempat_lahir',
        'tanggal_lahir',
        'tanggal_pencatatan',
        'status_perkawinan',
        'agama',
        'golongan_darah',
        'kewarganegaraan',
        'etnis',
        'pendidikan',
        'mata_pencaharian',
        'nama_ayah',
        'nama_ibu',
        'akseptor_kb',
        'cacat_fisik',
        'cacat_mental',
        'wajib_pajak',
        'lembaga_pemerintahan',
        'lembaga_kemasyarakatan',
    ];

    /**
     * Atribut yang harus di-cast ke tipe data tertentu.
     * Ini berguna untuk data yang disimpan sebagai JSON (dari checkbox).
     *
     * @var array<string, string>
     */
    protected $casts = [
        'cacat_fisik' => 'array',
        'cacat_mental' => 'array',
        'lembaga_pemerintahan' => 'array',
        'lembaga_kemasyarakatan' => 'array',
    ];

    /**
     * Mendefinisikan relasi "belongsTo" ke model KartuKeluarga.
     * Setiap anggota keluarga pasti dimiliki oleh satu kartu keluarga.
     */
    public function kartuKeluarga()
    {
        // Sesuaikan 'App\Models\KartuKeluarga' jika nama model KK Anda berbeda
        return $this->belongsTo(DataKeluarga::class, 'kartu_keluarga_id');
    }
}
