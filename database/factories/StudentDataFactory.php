<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentData>
 */
class StudentDataFactory extends Factory
{
    public function definition(): array
    {
        // WARNING: must defined: student_id
        return [
            'student_id' => null,
            'birth_date' => fake()
                ->dateTimeBetween(
                    '- 30 years',
                    '- 17 years',
                ),
            'address' => fake()->address(),
            'father_name' => fake()->name('male'),
            'father_phone_number' => fake()->numerify('08##########'),
            'mother_name' => fake()->name('female'),
            'mother_phone_number' => fake()->numerify('08##########'),
        ];
    }
}
