<?php

namespace Database\Seeders;

use App\Models\Violation;
use Illuminate\Database\Seeder;

class ViolationSeeder extends Seeder
{
    public function run(): void
    {
        Violation::factory(50)->create();
    }
}
