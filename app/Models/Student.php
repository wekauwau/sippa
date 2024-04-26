<?php

namespace App\Models;

use App\Traits\HasMyFind;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasMyFind;

    protected $fillable = [
        'user_id',
        'room_id',
        'grade_id',
    ];
}
