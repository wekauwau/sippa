<?php

namespace Database\Seeders;

use App\Models\StudentData;
use Illuminate\Database\Seeder;

class StudentDataSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 4; $i <= 50; $i++) {
            if ($i > 23 && $i < 34) {
                continue;
            }

            StudentData::create([
                'student_user_id' => $i,
                'birth_date' => fake()
                    ->dateTimeBetween(
                        '- 30 years',
                        '- 17 years',
                    ),
                'address' => fake()->address(),
                'father_name' => fake()->name('male'),
                'mother_name' => fake()->name('female'),
            ]);
        }
    }
}
