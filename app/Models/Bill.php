<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bill extends Model
{
    protected $fillable = [
        'name',
        'info',
        'deadline',
        'amount',
    ];

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
