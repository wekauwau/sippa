<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class SickFactory extends Factory
{
    private string $last_start = '';

    private function getRandomStart()
    {
        $this->last_start = fake()
            ->dateTimeThisYear('last month')
            ->format('Y-m-d');

        return $this->last_start;
    }

    private function getRandomEnd()
    {
        $days = random_int(1, 5);

        return date(
            'Y-m-d',
            strtotime($this->last_start . " + {$days} days")
        );
    }

    public function definition(): array
    {
        $infos = collect([
            'Demam',
            'Pusing',
        ]);

        return [
            'student_id' => Student::all('id')->random(),
            'start' => $this->getRandomStart(),
            'end' => $this->getRandomEnd(),
            'info' => $infos->random(),
        ];
    }
}
