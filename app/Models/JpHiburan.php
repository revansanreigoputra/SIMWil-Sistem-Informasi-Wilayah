<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JpHiburan extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function prasaranahiburans()
    {
        return $this->hasMany(PrasaranaHiburan::class, 'jphiburan_id');
    }
}