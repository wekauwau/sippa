<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'room_group_id',
    ];

    public function room_group(): BelongsTo
    {
        return $this->belongsTo(RoomGroup::class);
    }

    public function name_with_room_group()
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                $room = $attributes['name'];
                error_log("room->name: $room");
                $room_group = $attributes['room_group.name'];
                error_log("room_group->name: $room_group");
                return "$room ($room_group)";
            },
        );
    }
}
