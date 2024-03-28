<?php

namespace Database\Factories;

use App\Models\Madin;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Absent>
 */
class AbsentFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => get_random_user_id(Student::class),
            'madin_id' => get_ids(Madin::class),
            'status' => fake()->randomElement(['a', 'i', 's']),
            'info' => fake()->text(),
        ];
    }
}
