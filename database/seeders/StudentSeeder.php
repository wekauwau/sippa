<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $first_student_id = 4;

        // grade leader (7)
        for ($i = 1; $i <= 7; $i++) {
            Student::factory()->create([
                'user_id' => $first_student_id++,
                'grade_id' => $i,
            ]);
        }

        for ($i = $first_student_id; $i <= 60; $i++) {
            if ($i > 23 && $i < 34) {
                continue;
            }

            Student::factory()->create([
                'user_id' => $i,
            ]);
        }

        // user with role: student, manager, teacher
        Student::where('user_id', 20)
            ->update(['grade_id' => 7]);
    }
}
