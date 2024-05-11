<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RoomGroupSeeder::class,
            RoomSeeder::class,
            GradeSeeder::class,
            StudentSeeder::class,
            StudentDataSeeder::class,
            DivisionSeeder::class,
            ManagerSeeder::class,
            SemesterSeeder::class,
            MadinRoomSeeder::class,
            LessonSeeder::class,
            TeacherSeeder::class,
            MadinSeeder::class,
            ViolationSeeder::class,
            SickSeeder::class,
            StudentDataSeeder::class,
            BillSeeder::class,
            PaymentSeeder::class,
            AbsentSeeder::class,
        ]);
    }
}
