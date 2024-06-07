<?php

namespace Database\Seeders;

use App\Models\Servant;
use Illuminate\Database\Seeder;

class ServantSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [4, 1],
            [5, 2],
            [6, 3],
            [7, 4],
            [8, 5],
            [9, 6],
            [10, 7],
        ];

        foreach ($data as $item) {
            Servant::create([
                'student_id' => $item[0],
                'service_id' => $item[1],
            ]);
        }
    }
}
