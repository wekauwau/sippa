<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sick>
 */
class SickFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_user_id' => get_random_user_id(Student::class),
            'start' => date('Y-m-d'),
            'end' => date('Y-m-d'),
            'info' => 'Lorem ipsum dolor',
        ];
    }
}
