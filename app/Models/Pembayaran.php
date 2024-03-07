<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        'tagihan_id',
        'user_id',
        'status',
    ];
}
