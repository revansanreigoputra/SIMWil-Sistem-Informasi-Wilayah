<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class APBDesa extends Model
{
    use HasFactory;

    protected $table = 'a_p_b_desas';

    protected $fillable = [
        'tanggal',
        'apbd_kabupaten',
        'bantuan_pemerintah_kabupaten',
        'bantuan_pemerintah_provinsi',
        'bantuan_pemerintah_pusat',
        'pendapatan_asli_desa',
        'swadaya_masyarakat',
        'alokasi_dana_desa',
        'sumber_pendapatan_perusahaan',
        'sumber_pendapatan_lain',
        'jumlah_penerimaan',
        'jumlah_belanja_publik',
        'jumlah_belanja_aparatur',
        'jumlah_belanja',
        'saldo_anggaran',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'apbd_kabupaten' => 'integer',
        'bantuan_pemerintah_kabupaten' => 'integer',
        'bantuan_pemerintah_provinsi' => 'integer',
        'bantuan_pemerintah_pusat' => 'integer',
        'pendapatan_asli_desa' => 'integer',
        'swadaya_masyarakat' => 'integer',
        'alokasi_dana_desa' => 'integer',
        'sumber_pendapatan_perusahaan' => 'integer',
        'sumber_pendapatan_lain' => 'integer',
        'jumlah_penerimaan' => 'integer',
        'jumlah_belanja_publik' => 'integer',
        'jumlah_belanja_aparatur' => 'integer',
        'jumlah_belanja' => 'integer',
        'saldo_anggaran' => 'integer',
    ];
}

