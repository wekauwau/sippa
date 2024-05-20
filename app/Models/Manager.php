<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Manager extends Model
{
    protected $fillable = [
        'student_id',
        'division_id',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }
}
