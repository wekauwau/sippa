<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // principal
        User::factory(1)
            ->create([
                'name' => fake()->name('female'),
                'gender' => 0,
            ]);
        User::factory(2)
            ->create([
                'name' => fake()->name('male'),
                'gender' => 1,
            ]);

        // student, manager
        // student, manager, teacher
        User::factory(20)
            ->state(new Sequence(
                [
                    'name' => fake()->name('female'),
                    'gender' => 0,
                ],
                [
                    'name' => fake()->name('male'),
                    'gender' => 1,
                ],
            ))
            ->create();

        // teacher
        // student, teacher
        // student
        User::factory(27)->create();

        // student (alumni)
        User::factory(10)
            ->state([
                'active' => 0,
            ])
            ->create();
    }
}
