<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Customer extends Model
{
    protected $fillable = ['name', 'phone', 'email', 'address'];
}
