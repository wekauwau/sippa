<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Madin extends Model
{
    protected $fillable = [
        'semester_id',
        'day',
        'grade_id',
        'madin_room_id',
        'lesson_id',
        'teacher_user_id',
    ];
}
