<?php

namespace App\Models;

use App\Traits\HasMyFind;
use Illuminate\Database\Eloquent\Model;

class StudentData extends Model
{
    use HasMyFind;

    protected $fillable = [
        'user_id',
        'birth_date',
        'address',
        'father_name',
        'mother_name',
    ];
}
