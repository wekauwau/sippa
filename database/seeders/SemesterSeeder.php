<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [2024, 2025, 0, 1],
            [2024, 2025, 1, 0],
        ];

        foreach ($records as $record) {
            Semester::create([
                'start' => $record[0],
                'end' => $record[1],
                'isEven' => $record[2],
                'active' => $record[3],
            ]);
        }
    }
}
