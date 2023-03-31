<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RoleTypeSeeder::class,
            RolePesantrenSeeder::class,
            UserSeeder::class,
            EventNameSeeder::class,
            EventSeeder::class,
            DivisionSeeder::class,
            RoleSeeder::class,
            DivisionMemberSeeder::class,
            DataSeeder::class,
            OpenDataSeeder::class,
        ]);
    }
}
