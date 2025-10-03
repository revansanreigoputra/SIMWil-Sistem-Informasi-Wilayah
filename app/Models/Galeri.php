<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $fillable = ['album'];

    /**
     * Mendefinisikan relasi one-to-many ke model Photo.
     * Satu album (Galeri) bisa memiliki banyak foto.
     */
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
