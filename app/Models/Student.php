<?php

namespace App\Models;

use App\Traits\HasMyFind;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasMyFind;

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id',
        'room_id',
        'grade_id',
    ];

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }
}
