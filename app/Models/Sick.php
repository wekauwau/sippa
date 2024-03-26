<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sick extends Model
{
    protected $fillable = [
        'student_user_id',
        'start',
        'end',
        'info',
    ];
}
