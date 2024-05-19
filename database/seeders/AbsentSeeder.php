<?php

namespace Database\Seeders;

use App\Models\Absent;
use Illuminate\Database\Seeder;

class AbsentSeeder extends Seeder
{
    public function run(): void
    {
        Absent::factory(50)->create();
    }
}
