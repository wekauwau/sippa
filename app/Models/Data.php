<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = [
        'divisions_id',
        'name',
        'link',
        'file',
    ];
}
