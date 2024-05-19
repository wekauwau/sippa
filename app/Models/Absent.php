<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absent extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_user_id',
        'when',
        'madin_id',
        'status',
        'info',
    ];
}
