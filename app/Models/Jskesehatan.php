<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jskesehatan extends Model
{
    use HasFactory;

    protected $table = 'jskesehatans';
    protected $fillable = ['nama'];

    /**
     * Relasi ke Sarana Kesehatan
     * Satu jenis sarana kesehatan memiliki banyak data
     */
    public function saranakesehatans()
    {
        return $this->hasMany(Saranakesehatan::class, 'jskesehatan_id');
    }
}