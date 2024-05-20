<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'room_group_id',
    ];

    protected $appends = ['name_with_room_group'];

    public function getNameWithRoomGroupAttribute()
    {
        return "$this->name ({$this->room_group->name})";
    }

    public function room_group(): BelongsTo
    {
        return $this->belongsTo(RoomGroup::class);
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
