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
                42,
                '2024-02-15',
                37,
                'a',
                'Mengikuti kegiatan di luar tanpa izin',
            ],
            [
                42,
                '2024-02-21',
                39,
                'i',
                'Kegiatan di luar',
            ],
        ];

        foreach ($data as $record) {
            Absent::create(
                [
                    'user_id' => $record[0],
                    'when' => $record[1],
                    'madin_id' => $record[2],
                    'status' => $record[3],
                    'info' => $record[4],
                ]
            );
        }
    }
}
