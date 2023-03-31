<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DivisionMember extends Model
{
    protected $fillable = [
        'divisions_id',
        'users_id',
    ];
}
