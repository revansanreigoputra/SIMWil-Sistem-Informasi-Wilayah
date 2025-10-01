<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['galeri_id', 'foto'];

    /**
     * Mendefinisikan relasi many-to-one ke model Galeri.
     * Satu foto hanya dimiliki oleh satu album (Galeri).
     */
    public function galeri()
    {
        return $this->belongsTo(Galeri::class);
    }
}

