<?php

namespace Database\Seeders;

use App\Models\Absent;
use Illuminate\Database\Seeder;

class AbsentSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                20,
                '2024-02-15',
                37,
                'a',
                null,
            ],
            [
                20,
                '2024-02-21',
                39,
                'i',
                'Rapat di kampus',
            ],
        ];

        foreach ($data as $record) {
            Absent::create([
                'user_id' => $record[0],
                'when' => $record[1],
                'madin_id' => $record[2],
                'status' => $record[3],
                'info' => $record[4],
            ]);
        }
    }
}
