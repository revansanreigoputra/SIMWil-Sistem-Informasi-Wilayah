<?php

namespace App\Models;

use App\Models\MasterPerkembangan\PenentuanKepalaDesa;
use App\Models\MasterPerkembangan\PenentuanSekretarisDesa;
use App\Models\MasterPerkembangan\PenentuanPerangkatDesa;
use App\Models\MasterPerkembangan\PenentuanLurah;
use App\Models\MasterPerkembangan\PenentuanAnggotaBpd;
use App\Models\MasterPerkembangan\PenentuanKetuaBpd;
use App\Models\MasterPerkembangan\PengurusLkd;
use App\Models\MasterPerkembangan\PengurusLkk;
use App\Models\MasterPerkembangan\HukumLkk;
use App\Models\MasterPerkembangan\HukumLkd;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class politik extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
    'desa_id',
    'tanggal',
    'jumlah_penduduk_memiliki_hak_pilih',
    'jumlah_pengguna_hak_pilih_pemilu_legislatif',
    'jumlah_perempuan_aktif_partai_politik',
    'jumlah_partai_politik_memiliki_pengurus',
    'jumlah_partai_politik_memiliki_kantor',
    'jumlah_penduduk_pengurus_partai',
    'jumlah_penduduk_dipilih_legislatif',
    'jumlah_pengguna_hak_pilih_presiden',
    'jumlah_penduduk_memiliki_hak_pilih_pilkada',
    'jumlah_pengguna_hak_pilih_bupati',
    'jumlah_pengguna_hak_pilih_gubernur',
    'penentuan_kepala_desa_id',
    'penentuan_sekretaris_desa_id',
    'penentuan_perangkat_desa_id',
    'masa_jabatan_kepala_desa',
    'penentuan_lurah_id',
    'jumlah_anggota_bpd',
    'penentuan_anggota_bpd_id',
    'penentuan_ketua_bpd_id',
    'kantor_bpd',
    'anggaran_bpd',
    'peraturan_desa',
    'permintaan_keterangan_kepala_desa',
    'rancangan_perdes',
    'menyalurkan_aspirasi',
    'menyatakan_pendapat',
    'menyampaikan_usul',
    'mengevaluasi_apb_desa',
    'keberadaan_organisasi_lkd',
    'hukum_lkds_id',
    'jumlah_organisasi_lkd_desa',
    'hukum_lkks_id',
    'jumlah_organisasi_lkd_kelurahan',
    'pengurus_lkd_id',
    'pengurus_lkk_id',
    'status_lkd',
    'jumlah_kegiatan_lkd',
    'fungsi_tugas_lkd',
    'jumlah_kegiatan_organisasi_lkd',
    'alokasi_anggaran_lkd',
    'alokasi_anggaran_organisasi',
    'kantor_lkd',
    'dukungan_pembiayaan',
    'realisasi_program_kerja',
    'keberadaan_alat_kelengkapan',
    'kegiatan_administrasi',
];

        
    
    protected $casts = [
        'tanggal'=> 'date',
        

    ];
    public function PenentuanKepalaDesa()
    {
        return $this->belongsTo(PenentuanKepalaDesa::class, 'penentuan_kepala_desa_id');
    }
    public function PenentuanSekretarisDesa()
    {
        return $this->belongsTo(PenentuanSekretarisDesa::class, 'penentuan_sekretaris_desa_id');
    }
    public function PenentuanPerangkatDesa()
    {
        return $this->belongsTo(PenentuanPerangkatDesa::class, 'penentuan_perangkat_desa_id');
    }
    public function PenentuanLurah()
    {
        return $this->belongsTo(PenentuanLurah::class, 'penentuan_lurah_id');
    }
    public function PenentuanAnggotaBpd()
    {
        return $this->belongsTo(PenentuanAnggotaBpd::class, 'penentuan_anggota_bpd_id');
    }
    public function PenentuanKetuaBpd()
    {
        return $this->belongsTo(PenentuanKetuaBpd::class, 'penentuan_ketua_bpd_id');
    }
    public function PengurusLkd()
    {
        return $this->belongsTo(PengurusLkd::class, 'pengurus_lkd_id');
    }
    public function PengurusLkk()
    {
        return $this->belongsTo(PengurusLkk::class, 'pengurus_lkk_id');
    }
    public function HukumLkk()
    {
        return $this->belongsTo(HukumLkk::class, 'hukum_lkks_id');
    }
    public function HukumLkd()
    {
        return $this->belongsTo(HukumLkd::class, 'hukum_lkds_id');
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}
