<?php

namespace Database\Seeders;

use App\Models\StudentData;
use Illuminate\Database\Seeder;

class StudentDataSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 4; $i <= 60; $i++) {
            if ($i > 23 && $i < 34) {
                continue;
            }

            StudentData::factory()
                ->create([
                    'student_user_id' => $i,
                ]);
        }
    }
}
