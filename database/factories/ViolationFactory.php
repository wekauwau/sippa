<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class ViolationFactory extends Factory
{
    private $infos = [
        'Meninggalkan mujahadah',
        'Meninggalkan madin',
        'Tidak melaksanakan piket hari Minggu',
    ];

    public function definition(): array
    {
        $random_index = random_int(0, count($this->infos) - 1);
        $random_info = $this->infos[$random_index];

        return [
            'student_user_id' => get_random_user_id(Student::class),
            'date' => fake()->dateTimeThisYear('yesterday'),
            'info' => $random_info,
        ];
    }
}
