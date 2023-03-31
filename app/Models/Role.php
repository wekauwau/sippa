<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'role_types_id',
        'users_id',
        'divisions_id',
    ];
}
