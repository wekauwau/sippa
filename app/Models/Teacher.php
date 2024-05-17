<?php

namespace App\Models;

use App\Traits\HasMyFind;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    use HasMyFind;

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function madins(): HasMany
    {
        return $this->hasMany(Madin::class, 'teacher_user_id');
    }
}
