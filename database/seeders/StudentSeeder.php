<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Room;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 2; $i <= 8; $i++) {
            Student::create([
                'user_id' => strval($i),
                'room_id' => get_ids(Room::class),
                'grade_id' => get_ids(Grade::class),
            ]);
        }
    }
}
