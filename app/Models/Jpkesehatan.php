<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jpkesehatan extends Model
{
    use HasFactory;

    protected $table = 'jpkesehatans';
    protected $fillable = ['nama'];

    /**
     * Relasi ke Prasaranakesehatan (one to many)
     */
    public function prasaranakesehatans()
    {
        return $this->hasMany(Prasaranakesehatan::class, 'jpkesehatan_id');
    }
}