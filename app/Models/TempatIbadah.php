<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatIbadah extends Model
{
    use HasFactory;
    protected $table = 'tempat_ibadahs';
    protected $fillable = [
        'nama_tempat',
    ];

    public function prasaranaPeribadatans()
    {
        return $this->hasMany(PrasaranaPeribadatan::class);
    }
}