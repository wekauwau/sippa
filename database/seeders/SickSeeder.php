<?php

namespace Database\Seeders;

use App\Models\Sick;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SickSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sick::factory(2)->create();
    }
}
