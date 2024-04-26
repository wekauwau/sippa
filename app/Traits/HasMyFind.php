<?php

namespace App\Traits;

trait HasMyFind
{
    public static function my_find(int|string $key): ?object
    {
        return self::where('user_id', $key)->first();
    }
}
