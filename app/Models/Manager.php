<?php

namespace App\Models;

use App\Traits\HasMyFind;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasMyFind;

    protected $fillable = [
        'user_id',
        'division_id',
    ];
}
