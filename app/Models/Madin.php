<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Madin extends Model
{
    protected $fillable = [
        'semester_id',
        'day',
        'grade_id',
        'madin_room_id',
        'lesson_id',
        'teacher_user_id',
    ];

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }

    public function madin_room(): BelongsTo
    {
        return $this->belongsTo(MadinRoom::class);
    }

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'teacher_user_id', 'user_id');
    }
}
