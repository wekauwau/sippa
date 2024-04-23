<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 14; $i <= 43; $i++) {
            Teacher::create([
                'user_id' => $i,
            ]);
        }
    }
}
