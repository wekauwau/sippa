<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    public function run(): void
    {
        $first_student_id = 4;
        $data = [
            [
                '1 I\'dadiyah Putra',
            ],
            [
                '1 I\'dadiyah Putri',
            ],
            [
                '2 Awaliyah Putra',
            ],
            [
                '2 Awaliyah Putri',
            ],
            [
                '3 Wustho',
            ],
            [
                '4 \'Ulya',
            ],
            [
                '5 Takhasus',
            ],
        ];

        foreach ($data as $record) {
            Grade::create(
                [
                    'name' => $record[0],
                    'leader_user_id' => $first_student_id++,
                ]
            );
        }

        Grade::where('id', 7)
            ->update(['leader_user_id' => 20]);
    }
}
