<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterPotensi\RuangPublik as MasterRuangPublik;

class PRuangPublik extends Model
{
    use HasFactory;

    protected $table = 'p_ruang_publiks';

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal' => 'date',
        'luas_m2' => 'decimal:2',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function ruangPublik()
    {
        return $this->belongsTo(MasterRuangPublik::class, 'ruang_publik_id');
    }
}
