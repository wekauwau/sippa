<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    public function run(): void
    {
        Semester::create([
            'start' => 2024,
            'end' => 2025,
            'isEven' => 0,
            'active' => 1,
        ]);
    }
}
