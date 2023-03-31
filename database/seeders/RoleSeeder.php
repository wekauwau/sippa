<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // --------- Pesantren ---------
            [
                'role_types_id' => 1,
                'users_id' => 2,
                'divisions_id' => 1,
                // Nizar Ketua/Lurah
            ],
            [
                'role_types_id' => 1,
                'users_id' => 3,
                'divisions_id' => 1,
                // Isna
            ],
            [
                'role_types_id' => 2,
                'users_id' => 4,
                'divisions_id' => 2,
                // Handika Bendahara
            ],
            [
                'role_types_id' => 2,
                'users_id' => 5,
                'divisions_id' => 3,
                // Taufiq Kebersihan
            ],
            [
                'role_types_id' => 2,
                'users_id' => 6,
                'divisions_id' => 4,
                // Ikhsanun Humas
            ],
            [
                'role_types_id' => 3,
                'users_id' => 7,
                'divisions_id' => 4,
                // Zulfa
            ],
            [
                'role_types_id' => 2,
                'users_id' => 8,
                'divisions_id' => 5,
                // Hanifian PMBS
            ],
            [
                'role_types_id' => 2,
                'users_id' => 9,
                'divisions_id' => 6,
                // Wahyu Eka Keamanan
            ],

            // --------- Idul Adha 2022 ---------
            [
                'role_types_id' => 1,
                'users_id' => 9,
                'divisions_id' => 7,
                // Wahyu Eka Ketua
            ],
            [
                'role_types_id' => 2,
                'users_id' => 4,
                'divisions_id' => 8,
                // Handika Sekben
            ],
            [
                'role_types_id' => 2,
                'users_id' => 8,
                'divisions_id' => 9,
                // Hanifian Perkap
            ],
            [
                'role_types_id' => 2,
                'users_id' => 5,
                'divisions_id' => 10,
                // Taufiq Humas
            ],
            [
                'role_types_id' => 3,
                'users_id' => 7,
                'divisions_id' => 10,
                // Zulfa Humas
            ],
            [
                'role_types_id' => 2,
                'users_id' => 10,
                'divisions_id' => 11,
                // Husnul Muadiba KRT
            ],
        ];

        foreach ($data as $val) {
            Role::create($val);
        }
    }
}
