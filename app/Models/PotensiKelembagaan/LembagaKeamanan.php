<?php

namespace App\Models\PotensiKelembagaan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Desa;

class LembagaKeamanan extends Model
{
    use HasFactory;

    protected $table = 'lembaga_keamanan';

    protected $fillable = [
        'desa_id',
        'tanggal',
        'keberadaan_hansip_linmas',
        'jumlah_hansip',
        'jumlah_satgas_linmas',
        'pelaksanaan_siskamling',
        'jumlah_pos_kamling',
        'keberadaan_satpam_swakarsa',
        'jumlah_anggota_satpam',
        'nama_organisasi_induk',
        'pemilik_organisasi_id',
        'keberadaan_organisasi_lain',
        'mitra_koramil_tni',
        'jumlah_anggota_koramil_tni',
        'jumlah_kegiatan_koramil_tni',
        'babinkantibmas_polri',
        'jumlah_anggota_babinkantibmas',
        'jumlah_kegiatan_babinkantibmas',
    ];
    

    public function pemilikOrganisasi()
    {
        return $this->belongsTo(PemilikOrganisasi::class);
    }
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}
