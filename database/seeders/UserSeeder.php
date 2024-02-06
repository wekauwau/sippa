<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* 7 for student which is required by grades.leader_user_id */
        /* 2 for pengasuh and teacher */
        User::factory(9)->create();
    }
}
