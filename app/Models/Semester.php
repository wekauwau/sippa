<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Semester extends Model
{
    protected $fillable = [
        'start',
        'end',
        'isEven',
        'active',
    ];

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                $result = "{$attributes['start']} - {$attributes['end']} ";

                if ($attributes['isEven']) return "$result (Genap)";
                return "$result (Ganjil)";
            }
        );
    }

    public function madins(): HasMany
    {
        return $this->hasMany(Madin::class);
    }
}
