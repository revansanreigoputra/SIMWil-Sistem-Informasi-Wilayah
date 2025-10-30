<?php

namespace App\Models\LayananSurat;

use App\Models\LayananSurat\KopTemplate;
use App\Models\LayananSurat\JenisSurat;
use App\Models\DataKeluarga;
use App\Models\AnggotaKeluarga;
use App\Models\Ttd;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    protected $table = 'permohonans';
    protected $fillable = [
        'id_kop_templates',
        'id_format_nomor_surats',
        'id_data_keluargas',
        'id_anggota_keluargas',
        'id_ttds',
        'custom_variables',
        'nomor_surat',
        'tanggal_permohonan',
        'nomor_urut',
        'tahun',
        'status',
        'catatan_penolakan',
        

    ];
    protected $casts = [
        'custom_variables' => 'array',
        
    ];
    public function kopTemplate()
    {
        return $this->belongsTo(KopTemplate::class, 'id_kop_templates');
    }
    public function jenisSurat()
    {
        return $this->belongsTo(\App\Models\LayananSurat\JenisSurat::class, 'id_format_nomor_surats');
    }
    public function dataKeluarga()
    {
        return $this->belongsTo(DataKeluarga::class, 'id_data_keluargas');
    }
    public function anggotaKeluarga()
    {
        return $this->belongsTo(AnggotaKeluarga::class, 'id_anggota_keluargas');
    }
    public function ttd()
    {
        return $this->belongsTo(Ttd::class, 'id_ttds');
    }
}
