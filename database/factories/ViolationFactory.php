<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class ViolationFactory extends Factory
{
    public function definition(): array
    {
        $infos = collect([
            'Meninggalkan mujahadah',
            'Meninggalkan madin',
            'Tidak melaksanakan piket hari Minggu',
        ]);

        return [
            'student_id' => Student::all('id')->random(),
            'date' => fake()->dateTimeThisYear('yesterday'),
            'info' => $infos->random(),
        ];
    }
}
