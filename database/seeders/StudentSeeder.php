<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Room;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $first_student_id = 4;

        // grade leader (7)
        for ($i = 1; $i <= 7; $i++) {
            Student::create([
                'user_id' => $first_student_id++,
                'room_id' => get_ids(Room::class),
                'grade_id' => $i,
            ]);
        }

        for ($i = $first_student_id; $i <= 60; $i++) {
            if ($i > 23 && $i < 34) {
                continue;
            }

            Student::create([
                'user_id' => $i,
                'room_id' => get_ids(Room::class),
                'grade_id' => get_ids(Grade::class),
            ]);
        }

        // user with role: student, manager, teacher
        Student::query()
            ->where('user_id', 20)
            ->update(['grade_id' => 7]);
    }
}
