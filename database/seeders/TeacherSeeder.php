<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['user_id' => 7],
            ['user_id' => 8],
            ['user_id' => 9],
        ];

        foreach ($data as $record) {
            Teacher::create($record);
        }
    }
}
