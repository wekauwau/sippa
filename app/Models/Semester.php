<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Semester extends Model
{
    protected $fillable = [
        'start',
        'end',
        'isEven',
        'active',
    ];

    public function madins(): HasMany
    {
        return $this->hasMany(Madin::class);
    }
}
