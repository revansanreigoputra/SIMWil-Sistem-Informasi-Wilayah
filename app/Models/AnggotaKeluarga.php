<?php

namespace App\Models;

use App\Models\MasterDDK\{
    Agama,
    GolonganDarah,
    Kewarganegaraan,
    Pendidikan,
    MataPencaharian,
    KB,
    Cacat,
    KedudukanPajak,
    Lembaga,
    HubunganKeluarga
};
use App\Models\DataKeluarga;
use Illuminate\Database\Eloquent\Model;

class AnggotaKeluarga extends Model
{
    protected $table = 'anggota_keluargas';

    protected $fillable = [
        'data_keluarga_id',
        'no_urut',
        'nik',
        'no_akta_kelahiran',
        'nama',
        'jenis_kelamin',
        'hubungan_keluarga_id',
        'tempat_lahir',
        'tanggal_lahir',
        'tanggal_pencatatan',
        'status_perkawinan',
        'agama_id',
        'golongan_darah_id',
        'kewarganegaraan_id',
        'etnis',
        'pendidikan_id',
        'mata_pencaharian_id',
        'nama_orang_tua',
        'kb_id',
        'cacat_id',
        'nama_cacat',
        'kedudukan_pajak_id',
        'lembaga_id',
        'nama_lembaga',
    ];
    public function dataKeluarga()
    {
        return $this->belongsTo(DataKeluarga::class, 'data_keluarga_id');
    }

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'agama_id');
    }

    public function golonganDarah()
    {
        return $this->belongsTo(GolonganDarah::class, 'golongan_darah_id');
    }

    public function kewarganegaraan()
    {
        return $this->belongsTo(Kewarganegaraan::class, 'kewarganegaraan_id');
    }

    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class, 'pendidikan_id');
    }

    public function mataPencaharian()
    {
        return $this->belongsTo(MataPencaharian::class, 'mata_pencaharian_id');
    }

    public function kb()
    {
        return $this->belongsTo(KB::class, 'kb_id');
    }

    public function cacat()
    {
        return $this->belongsTo(Cacat::class, 'cacat_id');
    }

    public function kedudukanPajak()
    {
        return $this->belongsTo(KedudukanPajak::class, 'kedudukan_pajak_id');
    }

    public function lembaga()
    {
        return $this->belongsTo(Lembaga::class, 'lembaga_id');
    }
    public function hubunganKeluarga()
    {
        return $this->belongsTo(HubunganKeluarga::class, 'hubungan_keluarga_id');
    }
}
