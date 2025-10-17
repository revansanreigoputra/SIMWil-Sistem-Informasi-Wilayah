<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tap extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'jns_kelamin',
        'alamat',
        'kontak',
        'email',
        'tlp',
        'tgl_tap',
        'tahun',
        'id_wk',
        'id_ktk',
        'id_prov',
        'id_kabkot1',
        'id_kabkot2',
    ];
}
