<?php

namespace Database\Seeders;

use App\Models\Sick;
use Illuminate\Database\Seeder;

class SickSeeder extends Seeder
{
    public function run(): void
    {
        Sick::factory(50)->create();
    }
}
