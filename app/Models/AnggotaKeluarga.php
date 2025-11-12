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
        'status_kehidupan',
        'mutasi_type',
        'tanggal_mutasi',
        'catatan_mutasi',
        'email'
    ];
    protected $casts = [
        'tanggal_mutasi' => 'date',
        'tanggal_lahir' => 'date',
        'tanggal_pencatatan' => 'date',
    ];
    public function handleMutasi(string $mutasiType, array $dataMutasi = [])
    {
        switch ($mutasiType) {
            case 'meninggal':
                $this->status_kehidupan = 'meninggal';
                $this->mutasi_type = 'meninggal'; // ✅ optional if you have separate field
                $this->tanggal_mutasi = $dataMutasi['tanggal_surat'] ?? now();
                $this->catatan_mutasi = 'Meninggal berdasarkan Permohonan Surat ID ' . ($dataMutasi['permohonan_id'] ?? 'N/A');
                break;

            case 'pindah_keluar':
                $this->status_kehidupan = 'pindah';
                $this->mutasi_type = 'pindah_keluar';
                $this->tanggal_mutasi = $dataMutasi['tanggal_surat'] ?? now();
                $this->catatan_mutasi = 'Pindah keluar berdasarkan Permohonan Surat ID ' . ($dataMutasi['permohonan_id'] ?? 'N/A');
                break;

            case 'kelahiran':
                $this->status_kehidupan = 'hidup';
                $this->mutasi_type = 'kelahiran';
                $this->tanggal_mutasi = $dataMutasi['tanggal_surat'] ?? now();
                $this->catatan_mutasi = 'Penduduk baru hasil pencatatan kelahiran.';
                break;
        }

        $this->save();
    }

    public function isKepalaKeluarga()
    {
        // Ambil ID relasi 'Kepala Keluarga' secara aman
        $kkRelasi =  HubunganKeluarga::where('nama', 'Kepala Keluarga')->first();
        $idKepalaKeluarga = optional($kkRelasi)->id;

        // Cek apakah anggota ini memiliki ID hubungan yang sesuai DENGAN ID yang ditemukan di master data
        return $this->hubungan_keluarga_id === $idKepalaKeluarga;
    }

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
