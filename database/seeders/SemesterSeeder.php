<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [2024, 2025, 'Ganjil', 1],
            [2024, 2025, 'Genap', 0],
        ];

        foreach ($records as $record) {
            Semester::create([
                'start' => $record[0],
                'end' => $record[1],
                'semester' => $record[2],
                'active' => $record[3],
            ]);
        }
    }
}
