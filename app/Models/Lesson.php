<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lesson extends Model
{
    protected $fillable = [
        'name',
        'info',
    ];

    public function madins(): HasMany
    {
        return $this->hasMany(Madin::class);
    }
}
