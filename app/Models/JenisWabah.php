<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisWabah extends Model
{
    use HasFactory;

    protected $table = 'jenis_wabahs';

    protected $fillable = ['nama'];

    public function wabahPenyakit()
    {
        return $this->hasMany(WabahPenyakit::class, 'jenis_wabah_id');
    }
}
