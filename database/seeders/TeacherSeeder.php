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
        for ($i = 22; $i <= 51; $i++) {
            Teacher::create([
                'user_id' => strval($i),
            ]);
        }
    }
}
