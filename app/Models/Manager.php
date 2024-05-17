<?php

namespace App\Models;

use App\Traits\HasMyFind;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Manager extends Model
{
    use HasMyFind;

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id',
        'division_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }
}
