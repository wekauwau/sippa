<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => '1 I\'dadiyah Putra',
                'leader_user_id' => 2,
            ],
            [
                'name' => '1 I\'dadiyah Putri',
                'leader_user_id' => 3,
            ],
            [
                'name' => '2 Awaliyah Putra',
                'leader_user_id' => 4,
            ],
            [
                'name' => '2 Awaliyah Putri',
                'leader_user_id' => 5,
            ],
            [
                'name' => '3 Wustho',
                'leader_user_id' => 6,
            ],
            [
                'name' => '4 \'Ulya',
                'leader_user_id' => 7,
            ],
            [
                'name' => '5 Takhasus',
                'leader_user_id' => 8,
            ],
        ];

        foreach ($data as $record) {
            Grade::create($record);
        }
    }
}
