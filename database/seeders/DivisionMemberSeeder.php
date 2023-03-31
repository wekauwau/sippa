<?php

namespace Database\Seeders;

use App\Models\DivisionMember;
use Illuminate\Database\Seeder;

class DivisionMemberSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'divisions_id' => 1,
                'users_id' => 2,
            ],
            [
                'divisions_id' => 1,
                'users_id' => 3,
            ],
            [
                'divisions_id' => 1,
                'users_id' => 4,
            ],
            [
                'divisions_id' => 1,
                'users_id' => 5,
            ],
            [
                'divisions_id' => 2,
                'users_id' => 6,
            ],
            [
                'divisions_id' => 3,
                'users_id' => 7,
            ],
            [
                'divisions_id' => 3,
                'users_id' => 8,
            ],
            [
                'divisions_id' => 3,
                'users_id' => 9,
            ],
            [
                'divisions_id' => 4,
                'users_id' => 10,
            ],
            [
                'divisions_id' => 4,
                'users_id' => 11,
            ],
            [
                'divisions_id' => 5,
                'users_id' => 12,
            ],
            [
                'divisions_id' => 5,
                'users_id' => 13,
            ],
            [
                'divisions_id' => 6,
                'users_id' => 14,
            ],
            [
                'divisions_id' => 6,
                'users_id' => 15,
            ],
            [
                'divisions_id' => 7,
                'users_id' => 16,
            ],
            [
                'divisions_id' => 7,
                'users_id' => 17,
            ],
            [
                'divisions_id' => 7,
                'users_id' => 18,
            ],
            [
                'divisions_id' => 8,
                'users_id' => 19,
            ],
            [
                'divisions_id' => 8,
                'users_id' => 20,
            ],
            [
                'divisions_id' => 9,
                'users_id' => 21,
            ],
            [
                'divisions_id' => 9,
                'users_id' => 22,
            ],
            [
                'divisions_id' => 9,
                'users_id' => 23,
            ],
            [
                'divisions_id' => 10,
                'users_id' => 24,
            ],
            [
                'divisions_id' => 10,
                'users_id' => 25,
            ],
            [
                'divisions_id' => 11,
                'users_id' => 26,
            ],
            [
                'divisions_id' => 11,
                'users_id' => 27,
            ],
            [
                'divisions_id' => 12,
                'users_id' => 14,
            ],
            [
                'divisions_id' => 13,
                'users_id' => 8,
            ],
            [
                'divisions_id' => 14,
                'users_id' => 17,
            ],
            [
                'divisions_id' => 14,
                'users_id' => 23,
            ],
            [
                'divisions_id' => 15,
                'users_id' => 28,
            ],
        ];

        foreach ($data as $val) {
            DivisionMember::create($val);
        }
    }
}
