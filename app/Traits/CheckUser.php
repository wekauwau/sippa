<?php

namespace App\Traits;

use App\Models\User;

trait CheckUser
{
    private function getDivisionName(User $user): ?string
    {
        return $user->student?->manager?->division?->name;
    }
}
