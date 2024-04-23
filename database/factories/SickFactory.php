<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class SickFactory extends Factory
{
    private string $last_start = '';

    private $infos = [
        'Demam',
        'Pusing',
    ];

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

    private function getRandomInfos()
    {
        $random_index = random_int(0, count($this->infos) - 1);
        return $this->infos[$random_index];
    }

    public function definition(): array
    {
        return [
            'student_user_id' => get_random_user_id(Student::class),
            'start' => $this->getRandomStart(),
            'end' => $this->getRandomEnd(),
            'info' => $this->getRandomInfos(),
        ];
    }
}
