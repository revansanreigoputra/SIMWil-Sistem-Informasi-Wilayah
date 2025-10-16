<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jpgedung extends Model
{
    use HasFactory;

    protected $table = 'jpgedungs';
    protected $fillable = ['nama'];

    /**
     * Relasi ke prasarana pendidikan (one to many)
     */
    public function prasaranapendidikans()
    {
        return $this->hasMany(Prasaranapendidikan::class, 'jpgedung_id');
    }
}