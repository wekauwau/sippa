<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'room_id',
        'grade_id',
    ];

    protected $appends = ['name_with_room'];

    public function getNameWithRoomAttribute()
    {
        return nl2br(
            "{$this->user->name}\n" .
                "{$this->room->name_with_room_group}"
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }

    public function student_data(): HasOne
    {
        return $this->hasOne(StudentData::class);
    }

    public function manager(): HasOne
    {
        return $this->hasOne(Manager::class);
    }

    public function servant(): HasOne
    {
        return $this->hasOne(Servant::class);
    }

    public function absents(): HasMany
    {
        return $this->hasMany(Absent::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function sicks(): HasMany
    {
        return $this->hasMany(Sick::class);
    }

    public function violations(): HasMany
    {
        return $this->hasMany(Violation::class);
    }
}
