<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $fillable = [
        'name',
        'info',
        'deadline',
        'amount',
    ];
}
