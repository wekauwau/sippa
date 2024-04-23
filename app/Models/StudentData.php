<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentData extends Model
{
    protected $fillable = [
        'student_user_id',
        'birth_date',
        'address',
        'father_name',
        'mother_name',
    ];
}
