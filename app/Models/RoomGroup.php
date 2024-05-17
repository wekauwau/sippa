<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RoomGroup extends Model
{
    protected $fillable = [
        'name',
        'gender',
    ];

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
