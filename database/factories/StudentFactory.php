<?php

namespace Database\Factories;

use App\Models\Grade;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    public function definition(): array
    {
        // WARNING: must defined: user_id
        return [
            'user_id' => null,
            'room_id' => Room::all('id')->random(),
            'grade_id' => Grade::all('id')->random(),
        ];
    }
}
