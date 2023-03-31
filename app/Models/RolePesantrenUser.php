<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePesantrenUser extends Model
{
    protected $fillable = [
        'role_pesantrens_id',
        'users_id',
    ];
}
