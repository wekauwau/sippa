<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    protected $fillable = [
        'student_user_id',
        'date',
        'info',
        'punishment',
    ];
}
