<?php

namespace Database\Seeders;

use App\Models\RolePesantrenUser;
use Illuminate\Database\Seeder;

class RolePesantrenUserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'role_pesantrens_id' => 1,
                'users_id' => 2,
            ],
            [
                'role_pesantrens_id' => 1,
                'users_id' => 3,
            ],
            [
                'role_pesantrens_id' => 1,
                'users_id' => 4,
            ],
            [
                'role_pesantrens_id' => 1,
                'users_id' => 5,
            ],
            [
                'role_pesantrens_id' => 2,
                'users_id' => 1,
            ],
            [
                'role_pesantrens_id' => 3,
                'users_id' => 6,
            ],
            [
                'role_pesantrens_id' => 3,
                'users_id' => 7,
            ],
            [
                'role_pesantrens_id' => 3,
                'users_id' => 8,
            ],
            [
                'role_pesantrens_id' => 3,
                'users_id' => 9,
            ],
            [
                'role_pesantrens_id' => 3,
                'users_id' => 10,
            ],
            [
                'role_pesantrens_id' => 3,
                'users_id' => 11,
            ],
            [
                'role_pesantrens_id' => 3,
                'users_id' => 12,
            ],
            [
                'role_pesantrens_id' => 3,
                'users_id' => 13,
            ],
            [
                'role_pesantrens_id' => 3,
                'users_id' => 14,
            ],
            [
                'role_pesantrens_id' => 3,
                'users_id' => 15,
            ],
            [
                'role_pesantrens_id' => 3,
                'users_id' => 16,
            ],
            [
                'role_pesantrens_id' => 3,
                'users_id' => 17,
            ],
            [
                'role_pesantrens_id' => 3,
                'users_id' => 18,
            ],
            [
                'role_pesantrens_id' => 3,
                'users_id' => 19,
            ],
            [
                'role_pesantrens_id' => 3,
                'users_id' => 20,
            ],
            [
                'role_pesantrens_id' => 3,
                'users_id' => 21,
            ],
            [
                'role_pesantrens_id' => 3,
                'users_id' => 22,
            ],
            [
                'role_pesantrens_id' => 3,
                'users_id' => 23,
            ],
            [
                'role_pesantrens_id' => 3,
                'users_id' => 24,
            ],
            [
                'role_pesantrens_id' => 3,
                'users_id' => 25,
            ],
            [
                'role_pesantrens_id' => 3,
                'users_id' => 26,
            ],
            [
                'role_pesantrens_id' => 3,
                'users_id' => 27,
            ],
            [
                'role_pesantrens_id' => 4,
                'users_id' => 28,
            ],
        ];

        foreach ($data as $val) {
            RolePesantrenUser::create($val);
        }
    }
}
