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
        'recipient',
    ];

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
