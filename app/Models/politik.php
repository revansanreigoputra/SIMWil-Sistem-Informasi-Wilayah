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
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class politik extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'desa_id',
        
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

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}
