<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jpolahraga extends Model
{
    use HasFactory;

    protected $table = 'jpolahragas';
    protected $fillable = ['nama'];

    /**
     * Relasi ke prasarana olahraga
     * Satu jenis prasarana olahraga memiliki banyak prasarana
     */
    public function prasaranaolahragas()
    {
        return $this->hasMany(Prasaranaolahraga::class, 'jpolahraga_id');
    }
}