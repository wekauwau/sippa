<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servant extends Model
{
    protected $fillable = [
        'student_id',
        'service_id',
    ];
}
