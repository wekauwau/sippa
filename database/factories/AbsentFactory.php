<?php

namespace Database\Factories;

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
        $madins = $student->grade->madins()
            ->whereRelation('semester', 'active', 1)
            ->get();
        $statuses = collect(['i', 's', 'a']);

        return [
            'student_id' => $student->id,
            'when' => fake()->dateTimeThisYear('last week'),
            'madin_id' => $madins->random()->id,
            'status' => $statuses->random(),
            'info' => null,
        ];
    }
}
