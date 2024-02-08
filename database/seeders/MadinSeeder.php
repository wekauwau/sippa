<?php

namespace Database\Seeders;

use App\Models\Madin;
use Illuminate\Database\Seeder;

class MadinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'semester_id' => 1,
                'day' => 'Ahad',
                'grade_id' => 1,
                'madin_room_id' => 1,
                'lesson_id' => 1,
                'teacher_user_id' => 1,
            ],
        ];

        foreach ($data as $record) {
            Madin::create($record);
        }
    }
}
