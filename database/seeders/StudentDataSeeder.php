<?php

namespace Database\Seeders;

use App\Models\StudentData;
use Illuminate\Database\Seeder;

class StudentDataSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i < 47; $i++) {
            StudentData::factory()
                ->create([
                    'student_id' => $i,
                ]);
        }
    }
}
