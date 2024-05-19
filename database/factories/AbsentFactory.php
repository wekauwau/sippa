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
    public function definition(): array
    {
        $student = Student::all()->random();
        $madins = Madin::where('grade_id', $student->grade_id)->get();
        $statuses = collect(['i', 's', 'a']);

        return [
            'student_user_id' => $student->user_id,
            'when' => fake()->dateTimeThisYear('last week'),
            'madin_id' => $madins->random()->id,
            'status' => $statuses->random(),
            'info' => null,
        ];
    }
}
