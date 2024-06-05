<?php

namespace App\Traits;

use App\Models\User;

trait CheckUser
{
    private function getDivisionName(User $user): string|null
    {
        return $user->student?->manager?->division?->name;
    }
}
