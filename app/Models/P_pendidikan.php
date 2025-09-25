<?php

namespace App\Models;

use App\Models\Pendidikan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class P_pendidikan extends Model
{
    protected $fillable = [
        'tanggal',
        'id_pendidikan',
        'laki',
        'perempuan',
    ];

    /**
     * Get the pendidikan that owns the P_pendidikan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pendidikan(): BelongsTo
    {
        return $this->belongsTo(Pendidikan::class, 'id_pendidikan');
    }
}
