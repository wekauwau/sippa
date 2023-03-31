<?php

namespace Database\Seeders;

use App\Models\DivisionMember;
use Illuminate\Database\Seeder;

class DivisionMemberSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // --------- Pesantren ---------
            [
                'divisions_id' => 1,
                'users_id' => 2,
                // Ketua Nizar
            ],
            [
                'divisions_id' => 1,
                'users_id' => 3,
                // Isna
            ],
            [
                'divisions_id' => 2,
                'users_id' => 4,
                // Bendahara Handika
            ],
            [
                'divisions_id' => 3,
                'users_id' => 5,
                // Kebersihan Taufiq
            ],
            [
                'divisions_id' => 4,
                'users_id' => 6,
                // Humas Ikhsanun
            ],
            [
                'divisions_id' => 4,
                'users_id' => 7,
                // Zulfa
            ],
            [
                'divisions_id' => 5,
                'users_id' => 8,
                // PMBS Hanifian
            ],
            [
                'divisions_id' => 6,
                'users_id' => 9,
                // Keamanan Wahyu Eka
            ],

            // --------- Idul Adha 2022 ---------
            [
                'divisions_id' => 7,
                'users_id' => 9,
                // Ketua Wahyu Eka
            ],
            [
                'divisions_id' => 8,
                'users_id' => 4,
                // Sekben Handika
            ],
            [
                'divisions_id' => 9,
                'users_id' => 8,
                // Perkap Hanifian
            ],
            [
                'divisions_id' => 10,
                'users_id' => 5,
                // Humas Taufiq
            ],
            [
                'divisions_id' => 10,
                'users_id' => 7,
                // Humas Zulfa
            ],
            [
                'divisions_id' => 11,
                'users_id' => 10,
                // KRT Husnul Muadiba
            ],
        ];

        foreach ($data as $val) {
            DivisionMember::create($val);
        }
    }
}
