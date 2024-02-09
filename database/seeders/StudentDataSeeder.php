<?php

namespace Database\Seeders;

use App\Models\StudentData;
use Illuminate\Database\Seeder;

class StudentDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 7; $i++) {
            StudentData::create([
                'student_user_id' => $i,
                'birth_date' => date('Y-m-d'),
                'address' => fake()->address(),
                'father_name' => fake()->name('male'),
                'mother_name' => fake()->name('female'),
            ]);
        }
    }
}
