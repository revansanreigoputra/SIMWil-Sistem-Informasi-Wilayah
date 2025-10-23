<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLantai extends Model
{
    use HasFactory;

    protected $fillable = ['nama_lantai'];

    public function rumahMenurutLantai()
    {
        return $this->hasMany(RumahMenurutLantai::class, 'jenis_lantai_id');
    }
}
