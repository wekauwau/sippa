<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RoomGroupSeeder::class,
            RoomSeeder::class,
            GradeSeeder::class,
            StudentSeeder::class,
            DivisionSeeder::class,
            ManagerSeeder::class,
            SemesterSeeder::class,
            MadinRoomSeeder::class,
            LessonSeeder::class,
            TeacherSeeder::class,
            MadinSeeder::class,
            ViolationSeeder::class,
            SickSeeder::class,
        ]);
    }
}
