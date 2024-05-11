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
        return [
            'user_id' => 0,
            'phone_number' => fake()->phoneNumber(),
            'birth_date' => fake()
                ->dateTimeBetween(
                    '- 30 years',
                    '- 17 years',
                ),
            'address' => fake()->address(),
            'father_name' => fake()->name('male'),
            'father_phone_number' => fake()->phoneNumber(),
            'mother_name' => fake()->name('female'),
            'mother_phone_number' => fake()->phoneNumber(),
        ];
    }
}
