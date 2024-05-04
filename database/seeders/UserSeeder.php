<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // principal
        User::factory()
            ->create([
                'name' => fake()->name('female'),
                'gender' => 0,
            ]);
        for ($i = 0; $i < 2; $i++) {
            User::factory()
                ->create([
                    'name' => fake()->name('male'),
                    'gender' => 1,
                ]);
        }

        // student, manager
        // student, manager, teacher
        $odd = true;
        for ($i = 0; $i < 20; $i++) {
            $state = null;
            if ($odd) {
                $state = [
                    'name' => fake()->name('female'),
                    'gender' => 0,
                ];
            } else {
                $state = [
                    'name' => fake()->name('male'),
                    'gender' => 1,
                ];
            }

            User::factory()->create($state);
            $odd = !$odd;
        }

        // teacher
        // student, teacher
        // student
        User::factory(27)->create();

        // student (alumni)
        User::factory(10)
            ->create([
                'active' => 0,
            ]);
    }
}
